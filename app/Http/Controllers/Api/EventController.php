<?php

namespace App\Http\Controllers\Api;

use App\Models\Date;
use App\Models\Event;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Models\SocialNetwork;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Http\Resources\EventCollection;
use App\Http\Traits\Entity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\RespondsWithHttpStatus;

class EventController extends Controller
{
  // Import custom response trait.
  use RespondsWithHttpStatus;
  // Import Entity trait.
  use Entity;

  // Default pagination value.
  const PER_PAGE = 10;

  /**
   * Warning messages.
   *
   * @var array
   */
  protected $warning = [];

  /**
   * Sortable fields.
   *
   * @var array
   */
  protected $sortFields = ['start_date', 'end_date', 'start_time', 'end_time'];

  /**
   * Searchable fields.
   *
   * @var array
   */
  protected $searchFields = ['start_date', 'end_date'];

  /**
   * Searchable values.
   *
   * @var array
   */
  protected $searchValues = ['>=', '=', '<='];

  /**
   * Display the list of all events.
   *
   * @param Request $request
   * @return Response
   */
  public function index(Request $request)
  {
    // Search dates.
    $searchField = in_array(
      $request->input('search_field'),
      $this->searchFields
    )
      ? $request->input('search_field')
      : 'start_date';
    $searchValue = in_array(
      $request->input('search_value'),
      $this->searchValues
    )
      ? $request->input('search_value')
      : '>=';
    $searchReference = $request->input('search_reference')
      ? Carbon::parse($request->input('search_reference'))->toDateString()
      : Carbon::now()->toDateString();
    // By default, only returns events where date is superior or equal to today.
    $query = Date::whereDate($searchField, $searchValue, $searchReference)
      // Returns the list of dates with attached relationships.
      ->with([
        // Returns event:id and event:name.
        'event' => function ($filter) {
          $filter
            ->select('id', 'name')
            // Order event by name.
            ->orderBy('name')
            // Returns the total number of likes.
            // TODO show likes of the logged user.
            ->withCount([
              'likes as likes_count' => function ($filter) {
                $filter
                  ->where('is_dislike', 0);
              },
              // Returns the total number of dislikes.
              // TODO show dislikes of the logged user.
              'likes as dislikes_count' => function ($filter) {
                $filter
                  ->where('is_dislike', 1);
              },
              // Returns the total number of comments.
              'comments as comments_count'
            ])
            ->with([
              // Returns event's addresses.
              'addresses',
              // Returns people:id and people:nickname.
              'people' => function ($filter) {
                $filter
                  ->select('id', 'nickname')
                  // Order people by nickname.
                  ->orderBy('nickname');
              },
              // Returns venues:id and venues:name.
              'venues' => function ($filter) {
                $filter
                  ->select('id', 'name')
                  // Returns venues's addresses.
                  ->with('addresses')
                  // Order venues by name.
                  ->orderBy('name');
              },
              // Returns prices.
              'prices' => function ($filter) {
                $filter
                  // Order prices by cost.
                  ->orderBy('cost');
              },
              // Returns taxonomies.
              'taxonomies' => function ($filter) {
                $filter
                  // Order taxonomies by type.
                  ->orderBy('type')
                  // Order taxonomies by category.
                  ->orderBy('category')
                  // Order taxonomies by sub_category.
                  ->orderBy('sub_category');
              },
              // Returns favorites of the specified user.
              // TODO show favorites only if the user is logged in.
              'favorites'
            ]);
        }
      ]);
    // Sort data.
    $sortField = in_array(
      $request->input('sort_by'),
      $this->sortFields
    )
      ? $request->input('sort_by')
      : 'start_date';
    $sortOrder = in_array(
      $request->input('order_by'),
      ['asc', 'desc']
    )
      ? $request->input('order_by')
      : 'asc';
    $query = $query->orderBy($sortField, $sortOrder);
    // Pagination.
    $perPage = $request->input('per_page') ?? self::PER_PAGE;
    $events = $query->paginate((int)$perPage);
    // Check if events exist.
    if ($events->isEmpty()) {
      return $this->failure('No events were found.', 404);
    }
    // Format data.
    return new EventCollection($events);
  }

  /**
   * Creat a new event.
   *
   * @param  Request  $request
   * @return Response
   */
  public function store(Request $request)
  {
    // Validation.
    $validatorRules = $this->validateEvent();
    $validator = Validator::make($request->all(), $validatorRules);
    // If validation fails, returns error messages.
    if ($validator->fails()) {
      $errors = $validator->errors();
      return $this->failure($errors);
    }
    // Default response message.
    $messages = [];
    $messages[] = 'Event created successfully.';
    // Check if event's avatar is submitted.
    if ($request->file('avatar')) {
      // Prepare avatar's file to upload.
      $upload = $request->file('avatar');
      // Retrieve current datetime.
      $current = Carbon::now()->format('YmdHis_');
      // Format avatar's filename.
      $clean_filename = preg_replace("/[^A-Za-z0-9\_\-\.]/", '_', $upload->getClientOriginalName());
      // Add current datetime to avatar's formatted filename.
      $file_name =  $current . $clean_filename;
      // Create avatar/event folder if doesn't exist.
      if (!Storage::directories('avatar/event')) {
        Storage::makeDirectory('avatar/event');
      }
      // Store the avatar's file into storage avatar/event folder.
      $upload->storeAs('avatar/event', $file_name);
    }
    // Create a new event.
    $event = new Event([
      'name' => $request->input('name'),
      'description' => $request->input('description'),
      // TODO create a default event's avatar if not submitted.
      'avatar' => $request->file('avatar') ? 'avatar/event/' . $file_name : null,
      'user_id' => $request->input('user_id')
    ]);
    // Save the event.
    $event->save();
    // Create and attach dates to the event.
    $this->storeEntity($event, 'dates', 'App\Models\Date', $request);
    // Create and attach prices to the event.
    $this->storeEntity($event, 'prices', 'App\Models\Price', $request);
    // Attach venues to the event.
    $this->attachEntity($event, 'venues', 'Venue', 'App\Models\Venue', $request);
    // Attach people to the event.
    $this->attachEntity($event, 'people', 'Person', 'App\Models\Person', $request);
    // Create and attach addresses to the event.
    $this->storeEntity($event, 'addresses', 'App\Models\Address', $request);
    // Create and attach emails to the event.
    $this->storeEntity($event, 'emails', 'App\Models\Email', $request);
    // Create and attach phones to the event.
    $this->storeEntity($event, 'phones', 'App\Models\Phone', $request);
    // Attach files to the event.
    $this->attachEntity($event, 'files', 'File', 'App\Models\File', $request);
    // Attach taxonomies to the event.
    $this->attachEntity($event, 'taxonomies', 'Taxonomy', 'App\Models\Taxonomy', $request);
    // Check if event's websites are submitted.
    if ($request->input('websites')) {
      // Create new websites.
      $websites = [];
      foreach ($request->input('websites') as $website) {
        $newWebsite = new Website($website);
        $newWebsite->save();
        // Check if the new website is a social network.
        if ($newWebsite->type == 'social network') {
          // Validate submitted social network fields.
          $validator = Validator::make(
            $website['social_network'],
            ['type' => 'required|in:twitter,facebook,instagram,linkedin,youtube,twitch,snapchat,reddit,tiktok']
          );
          // If validation fails, add error messages.
          if ($validator->fails()) {
            $this->warning[] = 'Wrong social network type in website ' . $newWebsite->id;
          } else {
            // Create a new social network.
            $socialNetwork = new SocialNetwork([
              'type' => $website['social_network']['type'],
              'website_id' => $newWebsite->id
            ]);
            $socialNetwork->save();
          }
        }
        $websites[] = $newWebsite;
      }
      // Attach websites to the event.
      $event->websites()->saveMany($websites);
    }
    // Warning messages.
    if ($this->warning != null) {
      $messages[] = $this->warning;
    }
    // Returns the newly created event with response messages.
    return $this->success($messages, new EventResource($event), 201);
  }

  /**
   * Display the specified event.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    // Check if the event exists.
    $event = Event::find($id);
    if (!$event) {
      return $this->failure('Event not found.', 404);
    }
    // Return the event data.
    return new EventResource($event);
  }

  /**
   * Update the specified event.
   *
   * @param  int  $id
   * @param  Request  $request
   * @return Response
   */
  public function update($id, Request $request)
  {
    // Validation.
    $validatorRules = $this->validateEvent(true);
    $validator = Validator::make($request->all(), $validatorRules);
    // If validation fails, returns error messages.
    if ($validator->fails()) {
      $errors = $validator->errors();
      return $this->failure($errors);
    }
    // Default response message.
    $messages = [];
    $messages[] = 'Event edited successfully.';
    // Load the event.
    $event = Event::find($id);
    // Check if the event exists.
    if (!$event) {
      return $this->failure('Event not found.', 404);
    }
    // Update the event.
    $event->name = $request->input('name');
    $event->description = $request->input('description');
    // Delete dates from the event.
    $this->deleteEntity($event, 'dates');
    // Store new dates into event.
    $this->storeEntity($event, 'dates', 'App\Models\Date', $request);
    // Delete prices from the event.
    $this->deleteEntity($event, 'prices');
    // Store new prices into event.
    $this->storeEntity($event, 'prices', 'App\Models\Price', $request);
    // Detach current venues from the event.
    $event->venues()->detach();
    // Attach submitted venues to the event.
    $this->attachEntity($event, 'venues', 'Venue', 'App\Models\Venue', $request);
    // Detach current people from the event.
    $event->people()->detach();
    // Attach submitted people to the event.
    $this->attachEntity($event, 'people', 'Person', 'App\Models\Person', $request);
    // Detach current addresses from event.
    $this->detachEntity($event, 'event', 'addresses');
    // Delete addresses from the event.
    $this->deleteEntity($event, 'addresses');
    // Store new addresses into event.
    $this->storeEntity($event, 'addresses', 'App\Models\Address', $request);
    // Detach current emails from event.
    $this->detachEntity($event, 'event', 'emails');
    // Delete emails from the event.
    $this->deleteEntity($event, 'emails');
    // Store new emails into event.
    $this->storeEntity($event, 'emails', 'App\Models\Email', $request);
    // Detach current phones from event.
    $this->detachEntity($event, 'event', 'phones');
    // Delete phones from the event.
    $this->deleteEntity($event, 'phones');
    // Store new phones into event.
    $this->storeEntity($event, 'phones', 'App\Models\Phone', $request);
    // Detach current files from event.
    $this->detachEntity($event, 'event', 'files');
    // Delete current files from event.
    $this->deleteEntity($event, 'files');
    // Attach submitted files to the event.
    $this->attachEntity($event, 'files', 'File', 'App\Models\File', $request);
    // Detach current taxonomies from the event.
    $event->taxonomies()->detach();
    // Attach submitted taxonomies to the event.
    $this->attachEntity($event, 'taxonomies', 'Taxonomy', 'App\Models\Taxonomy', $request);

    /* TODO update event's avatar.

    // Check if submitted avatar is different from stored avatar.
    if ($request->file('avatar') != $event->avatar) {
      // Delete currently stored avatar
      Storage::delete($event->avatar);
      // Check if the submitted avatar is not null.
      if ($request->file('avatar') != null) {
        // Prepare the new avatar's file to upload.
        $upload = $request->file('avatar');
        // Retrieve current datetime.
        $current = Carbon::now()->format('YmdHis_');
        // Format avatar's filename.
        $clean_filename = preg_replace("/[^A-Za-z0-9\_\-\.]/", '_', $upload->getClientOriginalName());
        // Add current datetime to avatar's formatted filename.
        $file_name =  $current . $clean_filename;
        // Create avatar/event folder if doesn't exist.
        if (!Storage::directories('avatar/event')) {
          Storage::makeDirectory('avatar/event');
        }
        // Store the new avatar's file into storage avatar/event folder.
        $upload->storeAs('avatar/event', $file_name);
        // Save the new avatar's path into event.
        $event->avatar = 'avatar/event/' . $file_name;
      } else {
        // Delete the current avatar's path into event.
        $event->avatar = null;
      }
    }
 */

    // Detach current websites from event.
    $this->detachEntity($event, 'event', 'websites');
    // Delete current websites from event.
    $this->deleteEntity($event, 'websites');
    // Check if event's websites are submitted.
    if ($request->input('websites')) {
      // Create new websites.
      $websites = [];
      foreach ($request->input('websites') as $website) {
        $newWebsite = new Website($website);
        $newWebsite->save();
        // Check if the new website is a social network.
        if ($newWebsite->type == 'social network') {
          // Validate submitted social network fields.
          $validator = Validator::make(
            $website['social_network'],
            ['type' => 'required|in:twitter,facebook,instagram,linkedin,youtube,twitch,snapchat,reddit,tiktok']
          );
          // If validation fails, add error messages.
          if ($validator->fails()) {
            $this->warning[] = 'Wrong social network type in website ' . $newWebsite->id;
          } else {
            // Create a new social network.
            $socialNetwork = new SocialNetwork([
              'type' => $website['social_network']['type'],
              'website_id' => $newWebsite->id
            ]);
            $socialNetwork->save();
          }
        }
        $websites[] = $newWebsite;
      }
      // Attach websites to the event.
      $event->websites()->saveMany($websites);
    }
    // Save the event.
    $event->save();
    // Warning messages.
    if ($this->warning != null) {
      $messages[] = $this->warning;
    }
    // Returns the edited event with response messages.
    return $this->success($messages, new EventResource(Event::find($id)), 201);
  }

  /**
   * Remove the specified event.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }

  /**
   * Validate an event.
   *
   * @param  bool $update
   * @return array
   */
  protected function validateEvent($update = false)
  {
    $validatorRules = [];

    // Validate submitted fields.
    $validatorRules = [
      'name' => 'required|string|max:100',
      'description' => 'string|nullable',
      'avatar' => 'file|nullable',
      'user_id' => 'required|integer|digits_between:1,20',
      'dates.*.start_date' => 'required|date',
      'dates.*.end_date' => 'required|date|after_or_equal:dates.*.start_date',
      'dates.*.start_time' => 'required|date_format:H:i:s',
      'dates.*.end_time' => 'required|date_format:H:i:s',
      'prices.*.type' => 'required|in:adult,child,family,group,primary,secondary',
      'prices.*.cost' => 'required|regex:/^\d*(\.\d{1,2})?$/|max:10',
      'venues.*.id' => 'required|integer|digits_between:1,20',
      'people.*.id' => 'required|integer|digits_between:1,20',
      'addresses.*.type' => 'required|in:event',
      'addresses.*.street1' => 'required|string|max:100',
      'addresses.*.street2' => 'string|max:100|nullable',
      'addresses.*.zip' => 'required|string|max:10',
      'addresses.*.canton' => 'required|in:AG,AI,AR,BE,BL,BS,FR,GE,GL,GR,JU,LU,NE,NW,OW,SG,SH,SO,SZ,TG,TI,UR,VD,VS,ZG,ZH',
      'addresses.*.region' => 'string|max:30|nullable',
      'addresses.*.city' => 'required|string|max:30',
      'addresses.*.country' => 'required|string|max:4',
      'addresses.*.firstname' => 'string|max:30|nullable',
      'addresses.*.lastname' => 'string|max:30|nullable',
      'addresses.*.latitude' => 'string|max:30|nullable',
      'addresses.*.longitude' => 'string|max:30|nullable',
      'addresses.*.company' => 'string|max:100|nullable',
      'emails.*.type' => 'required|in:main,secondary,pro',
      'emails.*.address' => 'required|email|max:100',
      'phones.*.type' => 'required|in:mobile,home,pro',
      'phones.*.number' => 'required|string|max:30',
      'phones.*.firstname' => 'string|max:30|nullable',
      'phones.*.lastname' => 'string|max:30|nullable',
      'phones.*.company' => 'string|max:100|nullable',
      'websites.*.type' => 'required|in:website,social network',
      'websites.*.url' => 'required|string|max:255',
      'websites.*.name' => 'required|string|max:30',
      'files.*.id' => 'required|integer|digits_between:1,20',
      'taxonomies.*.id' => 'required|integer|digits_between:1,20',
    ];

    // Check id when event is updated.
    if ($update) {
      $validatorRules['id'] = 'required|integer|digits_between:1,20';
    }

    return $validatorRules;
  }
}

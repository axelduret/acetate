<?php

namespace App\Http\Controllers\Api;

use App\Models\Date;
use App\Models\File;
use App\Models\Email;
use App\Models\Event;
use App\Models\Phone;
use App\Models\Price;
use App\Models\Address;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Models\SocialNetwork;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Http\Resources\EventCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\RespondsWithHttpStatus;
use App\Models\Person;
use App\Models\Taxonomy;
use App\Models\Venue;

class EventController extends Controller
{
  // Import custom response trait.
  use RespondsWithHttpStatus;

  // Default pagination value.
  const PER_PAGE = 10;

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
    // Search data.
    $searchField = $request->input('search_field');
    $searchableFields = in_array($searchField, $this->searchFields) ? $searchField : 'start_date';
    $searchValue = $request->input('search_value');
    $searchableValues = in_array($searchValue, $this->searchValues) ? $searchValue : '>=';
    $searchReference = $request->input('search_reference') ? Carbon::parse($request->input('search_reference'))->toDateString() : Carbon::now()->toDateString();
    // By default, only returns events where date is superior or equal to today.
    $query = Date::whereDate($searchableFields, $searchableValues, $searchReference)
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
    $sortField = $request->input('sort_by');
    $sortableFields = in_array($sortField, $this->sortFields) ? $sortField : 'start_date';
    $orderField = $request->input('order_by');
    $sortOrder = in_array($orderField, ['asc', 'desc']) ? $orderField : 'asc';
    $query = $query->orderBy($sortableFields, $sortOrder);
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
    // Collect response messages.
    $errors = [];
    $messages = [];
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
    // Check if event's dates are submitted.
    if ($request->input('dates')) {
      // Create new dates.
      $dates = [];
      foreach ($request->input('dates') as $date) {
        $dates[] = new Date($date);
      }
      // Attach dates to the event.
      $event->dates()->saveMany($dates);
    }
    // Check if event's prices are submitted.
    if ($request->input('prices')) {
      // Create new prices.
      $prices = [];
      foreach ($request->input('prices') as $price) {
        $prices[] = new Price($price);
      }
      // Attach prices to the event.
      $event->prices()->saveMany($prices);
    }
    // Check if event's venues are submitted.
    if ($request->input('venues')) {
      // Collect venues.
      $venues = [];
      foreach ($request->input('venues') as $venue) {
        $venueError = false;
        // Check if the venue exists.
        $id = $venue['id'];
        $venue = Venue::find($id);
        if (!$venue) {
          $venueError = true;
          $errors[] = 'Venue ' . $id . ' not found.';
        }
        if ($venueError == false) {
          $venues[] = $venue;
        }
      }
      // Attach venues to the event.
      if ($venues != null) {
        $event->venues()->saveMany($venues);
      }
    }
    // Check if event's people are submitted.
    if ($request->input('people')) {
      // Collect people.
      $people = [];
      foreach ($request->input('people') as $person) {
        $personError = false;
        // Check if the person exists.
        $id = $person['id'];
        $person = Person::find($id);
        if (!$person) {
          $personError = true;
          $errors[] = 'Person ' . $id . ' not found.';
        }
        if ($personError == false) {
          $people[] = $person;
        }
      }
      // Attach people to the event.
      if ($people != null) {
        $event->people()->saveMany($people);
      }
    }
    // Check if event's addresses are submitted.
    if ($request->input('addresses')) {
      // Create new addresses.
      $addresses = [];
      foreach ($request->input('addresses') as $address) {
        $address['type'] = 'event';
        $addresses[] = new Address($address);
      }
      // Attach addresses to the event.
      $event->addresses()->saveMany($addresses);
    }
    // Check if event's emails are submitted.
    if ($request->input('emails')) {
      // Create new emails.
      $emails = [];
      foreach ($request->input('emails') as $email) {
        $emails[] = new Email($email);
      }
      // Attach emails to the event.
      $event->emails()->saveMany($emails);
    }
    // Check if event's phones are submitted.
    if ($request->input('phones')) {
      // Create new phones.
      $phones = [];
      foreach ($request->input('phones') as $phone) {
        $phones[] = new Phone($phone);
      }
      // Attach phones to the event.
      $event->phones()->saveMany($phones);
    }
    // Check if event's websites are submitted.
    if ($request->input('websites')) {
      // Create new websites.
      $websites = [];
      foreach ($request->input('websites') as $website) {
        $newWebsite = new Website($website);
        $newWebsite->save();
        // Check if the new website is a social network.
        if ($newWebsite->type == 'social network') {
          // Validate submitted fields.
          $validatorRules = ['type' => 'required|in:twitter,facebook,instagram,linkedin,youtube,twitch,snapchat,reddit,tiktok'];
          $validator = Validator::make($website['social_network'], $validatorRules);

          // If validation fails, returns error messages.
          if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->failure($errors);
          }
          // Create a new social network.
          $socialNetwork = new SocialNetwork([
            'type' => $website['social_network']['type'],
            'website_id' => $newWebsite->id
          ]);
          $socialNetwork->save();
        }
        $websites[] = $newWebsite;
      }
      // Attach websites to the event.
      $event->websites()->saveMany($websites);
    }
    // Check if event's files are submitted.
    if ($request->input('files')) {
      // Collect files.
      $files = [];
      foreach ($request->input('files') as $file) {
        $fileError = false;
        // Check if the file exists.
        $id = $file['id'];
        $file = File::find($id);
        if (!$file) {
          $fileError = true;
          $errors[] = 'File ' . $id . ' not found.';
        }
        if ($fileError == false) {
          $files[] = $file;
        }
      }
      // Attach files to the event.
      if ($files != null) {
        $event->files()->saveMany($files);
      }
    }
    // Check if event's taxonomies are submitted.
    if ($request->input('taxonomies')) {
      // Collect taxonomies.
      $taxonomies = [];
      foreach ($request->input('taxonomies') as $taxonomy) {
        $taxonomyError = false;
        // Check if the file exists.
        $id = $taxonomy['id'];
        $taxonomy = Taxonomy::find($id);
        if (!$taxonomy) {
          $taxonomyError = true;
          $errors[] = 'Taxonomy ' . $id . ' not found.';
        }
        if ($taxonomyError == false) {
          $taxonomies[] = $taxonomy;
        }
      }
      // Attach taxonomies to the event.
      if ($taxonomies != null) {
        $event->taxonomies()->saveMany($taxonomies);
      }
    }
    // Returns response messages.
    $success = 'New event has been created.';
    if ($errors != null) {
      $messages[] = $success;
      $messages[] = $errors;
    } else {
      $messages = $success;
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
  public function show(int $id)
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
  public function update(int $id, Request $request)
  {
    //
  }

  /**
   * Remove the specified event.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(int $id)
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

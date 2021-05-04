<?php

namespace App\Http\Controllers\Api;

use App\Models\Date;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Http\Resources\EventCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\RespondsWithHttpStatus;

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
    $searchReference = $request->input('search_reference') ? $request->input('search_reference') : Carbon::now()->toDateString();

    // By default, only returns events where date is superior or equal to today.
    $query = Date::where($searchableFields, $searchableValues, $searchReference)
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
    if ($events == '') {
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

    // Prepare avatar's file to upload.
    $upload = $request->file('avatar');
    // Format avatar's filename.
    $current = Carbon::now()->format('YmdHis_');
    $clean_filename = preg_replace("/[^A-Za-z0-9\_\-\.]/", '_', $upload->getClientOriginalName());
    $file_name =  $current . $clean_filename;

    // Create a new event.
    $event = new Event([
      'name' => $request->input('name'),
      'description' => $request->input('description'),
      'avatar' => 'avatar/event/' . $file_name,
      'user_id' => $request->input('user_id')
    ]);
    // Save the event.
    $event->save();

    // Create avatar/event folder if doesn't exist.
    if (!Storage::directories('avatar/event')) {
      Storage::makeDirectory('avatar/event');
    }

    // Store the avatar's file into storage avatar/event folder.
    $upload->storeAs('avatar/event', $file_name);

    // Returns the newly created event.
    return new EventResource($event);
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

    // Validating fields.
    $validatorRules = [
      'name' => 'required|string|max:100',
      'description' => 'string|nullable',
      'avatar' => 'file|nullable',
      'user_id' => 'required|integer|digits_between:1,20'
    ];

    // Check id when event is updated.
    if ($update) {
      $validatorRules['id'] = 'required|integer|digits_between:1,20';
    }

    return $validatorRules;
  }
}

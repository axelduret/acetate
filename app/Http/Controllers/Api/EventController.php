<?php

namespace App\Http\Controllers\Api;

use App\Models\Date;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventCollection;
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
  protected $searchFields = ['start_date', 'end_date', 'start_time', 'end_time'];

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
            ->withCount([
              'likes as likes_count' => function ($filter) {
                $filter
                  ->where('is_dislike', 0);
              },
              // Returns the total number of dislikes.
              'likes as dislikes_count' => function ($filter) {
                $filter
                  ->where('is_dislike', 1);
              },
              // Returns the total number of comments.
              'comments as comments_count'
            ])
            ->with([
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
                  ->orderBy('type');
              },
              // Returns favorites of the specified user.
              'favorites' // TODO show favorite only if user logged in.
            ]);
        }
      ]);

    // Retrieve data and sort it.
    $sortField = $request->input('sort_by');
    $sortableFields = in_array($sortField, $this->sortFields) ? $sortField : 'start_date';
    $orderField = $request->input('order_by');
    $sortOrder = in_array($orderField, ['asc', 'desc']) ? $orderField : 'asc';
    $query = $query->orderBy($sortableFields, $sortOrder);

    // Pagination.
    $perPage = $request->input('per_page') ?? self::PER_PAGE;
    $events = $query->paginate((int)$perPage);

    // Format data.
    return new EventCollection($events);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(int $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function update(int $id, Request $request)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    //
  }
}

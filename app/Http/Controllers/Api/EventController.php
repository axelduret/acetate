<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventCollection;
use App\Http\Traits\RespondsWithHttpStatus;
use App\Models\Event;

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
  protected $sortFields = ['name'];

  /**
   * Searchable fields.
   *
   * @var array
   */
  protected $searchFields = ['name'];

  /**
   * Display the list of all events.
   *
   * @param Request $request
   * @return Response
   */
  public function index(Request $request)
  {
    $query = Event::with([
      'venues' => function ($filter) {
        $filter
          ->select('id', 'name')
          ->orderBy('name');
      },
      'people' => function ($filter) {
        $filter
          ->select('id', 'nickname')
          ->orderBy('nickname');
      },
      'dates' => function ($filter) {
        $filter
          ->orderBy('start_date');
      },
      'prices' => function ($filter) {
        $filter
          ->orderBy('cost');
      },
      'taxonomies' => function ($filter) {
        $filter
          ->orderBy('type');
      },
      'likes', // TODO count likes.
      'favorites', // TODO show favorite only if user logged in.
      'comments' // TODO count comments.
    ]);

    // Retrieve data and sort it.
    $sortField = $request->input('sort_by');
    $sortableFields = in_array($sortField, $this->sortFields) ? $sortField : 'name'; // TODO improve sort_by.
    $orderField = $request->input('order_by');
    $sortOrder = in_array($orderField, ['asc', 'desc']) ? $orderField : 'asc';
    $query = $query->orderBy($sortableFields, $sortOrder);

    // Search data.
    $searchValue = $request->input('search'); // TODO improve search_fields. Add date/price filter, etc...
    if (!is_null($searchValue)) {
      $searchQuery = "%$searchValue%";
      $query = $query->where('name', 'like', $searchQuery);
    }

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
  public function show($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}

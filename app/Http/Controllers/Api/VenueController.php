<?php

namespace App\Http\Controllers\Api;

use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VenueResource;
use App\Http\Resources\VenueCollection;
use App\Http\Traits\RespondsWithHttpStatus;

class VenueController extends Controller
{
  // Import custom response trait.
  use RespondsWithHttpStatus;

  // Default pagination value.
  const PER_PAGE = 20;

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
   * Display the list of all venues.
   *
   * @param Request $request
   * @return Response
   */
  public function index(Request $request)
  {
    // Retrieve data and sort it.
    $sortField = $request->input('sort_by');
    $sortableFields = in_array($sortField, $this->sortFields) ? $sortField : 'name';
    $orderField = $request->input('order_by');
    $sortOrder = in_array($orderField, ['asc', 'desc']) ? $orderField : 'asc';
    $query = Venue::orderBy($sortableFields, $sortOrder);

    // Returns the list of venues with attached relationships.
    $query = $query->withCount([
      // Returns the total number of likes.
      // TODO show likes of the logged user.
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
        // Returns addresses.
        'addresses',
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

    // Search data.
    $searchField = $request->input('search_field');
    $searchValue = $request->input('search_value');
    $searchableFields = in_array($searchField, $this->searchFields) ? $searchField : null;
    if (!is_null($searchValue) && !is_null($searchableFields)) {
      $searchQuery = "%$searchValue%";
      $query = $query->where($searchableFields, 'like', $searchQuery);
    }

    // Pagination.
    $perPage = $request->input('per_page') ?? self::PER_PAGE;
    $venues = $query->paginate((int)$perPage);

    // Check if venues exist.
    if ($venues == '') {
      return $this->failure('No venues were found.', 404);
    }

    // Format data.
    return new VenueCollection($venues);
  }

  /**
   * Creat a new venue.
   *
   * @param  Request  $request
   * @return Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified venue.
   *
   * @param  int  $id
   * @return Response
   */
  public function show(int $id)
  {
    // Check if the venue exists.
    $venue = Venue::find($id);
    if (!$venue) {
      return $this->failure('Venue not found.', 404);
    }
    // Return the venue data.
    return new VenueResource($venue);
  }

  /**
   * Update the specified venue.
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
   * Remove the specified venue.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(int $id)
  {
    //
  }
}

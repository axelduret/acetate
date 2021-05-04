<?php

namespace App\Http\Controllers\Api;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonCollection;
use App\Http\Traits\RespondsWithHttpStatus;

class PersonController extends Controller
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
  protected $sortFields = ['nickname', 'firstname', 'lastname', 'type', 'company'];

  /**
   * Searchable fields.
   *
   * @var array
   */
  protected $searchFields = ['nickname', 'firstname', 'lastname', 'type', 'company'];

  /**
   * Display the list of all people.
   *
   * @param Request $request
   * @return Response
   */
  public function index(Request $request)
  {
    // Retrieve data and sort it.
    $sortField = $request->input('sort_by');
    $sortableFields = in_array($sortField, $this->sortFields) ? $sortField : 'nickname';
    $orderField = $request->input('order_by');
    $sortOrder = in_array($orderField, ['asc', 'desc']) ? $orderField : 'asc';
    $query = Person::orderBy($sortableFields, $sortOrder);

    // Returns the list of people with attached relationships.
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
    $people = $query->paginate((int)$perPage);

    // Format data.
    return new PersonCollection($people);
  }

  /**
   * Creat a new person.
   *
   * @param  Request  $request
   * @return Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified person.
   *
   * @param  int  $id
   * @return Response
   */
  public function show(int $id)
  {
    // Check if the person exists.
    $person = Person::find($id);
    if (!$person) {
      return $this->failure('Person not found.', 404);
    }
    // Return the person data.
    return new PersonResource($person);
  }

  /**
   * Update the specified person.
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
   * Remove the specified person.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(int $id)
  {
    //
  }
}

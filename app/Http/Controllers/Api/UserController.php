<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserEventsResource;
use App\Http\Resources\UserPeopleResource;
use App\Http\Resources\UserVenuesResource;
use App\Http\Traits\RespondsWithHttpStatus;

class UserController extends Controller
{
  // Import custom response trait.
  use RespondsWithHttpStatus;

  // Default pagination value.
  const PER_PAGE = 50;

  /**
   * Sortable fields.
   *
   * @var array
   */
  protected $sortFields = ['id', 'username', 'email', 'firstname', 'lastname', 'company', 'language'];

  /**
   * Searchable fields.
   *
   * @var array
   */
  protected $searchFields = ['username', 'email', 'firstname', 'lastname', 'company', 'language'];

  /**
   * Display the list of all users.
   *
   * @param Request $request
   * @return Response
   */
  public function index(Request $request)
  {
    // Retrieve data and sort it.
    $sortField = $request->input('sort_by');
    $sortOrder = $request->input('order_by') ?? 'asc';
    $sortableFields = in_array($sortField, $this->sortFields) ? $sortField : 'id';
    $query = User::orderBy($sortableFields, $sortOrder);

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
    $users = $query->paginate((int)$perPage);

    // Format data.
    return new UserCollection($users);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  Request  $request
   * @return Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified user.
   *
   * @param  Request  $request
   * @param  int  $id
   * @return Response
   */
  public function show(int $id, Request $request)
  {
    // Check if user exists.
    $user = User::find($id);
    if (!$user) {
      return $this->failure('User not found.', 404);
    }

    switch ($request->input('content')) {
      case 'events':
        // Return all events attached to the user.
        return new UserEventsResource(
          $user->events
            ->load('venues')
            ->load('dates')
            ->load('prices')
            ->load('taxonomies')
            ->load('likes')
            ->load('favorites')
        );
        break;
      case 'venues':
        // Return all venues attached to the user.
        return new UserVenuesResource(
          $user->venues
            ->load('addresses')
            ->load('taxonomies')
            ->load('likes')
            ->load('favorites')
        );
        break;
      case 'people':
        // Return all people attached to the user.
        return new UserPeopleResource(
          $user->people
            ->load('taxonomies')
            ->load('likes')
            ->load('favorites')
        );
        break;
      default:
        // Return the user data.
        return new UserResource($user);
    }
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

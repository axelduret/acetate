<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserFilesResource;
use App\Http\Resources\UserLikesResource;
use App\Http\Resources\UserEventsResource;
use App\Http\Resources\UserPeopleResource;
use App\Http\Resources\UserVenuesResource;
use App\Http\Resources\UserTicketsResource;
use App\Http\Traits\RespondsWithHttpStatus;
use App\Http\Resources\UserCommentsResource;
use App\Http\Resources\UserFavoritesResource;

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
   * User login.
   *
   * @param  Request  $request
   * @return Response
   */
  public function login(Request $request) // TODO Login
  {
    //
  }

  /**
   * User logout.
   *
   * @param  Request  $request
   * @return Response
   */
  public function logout(Request $request) // TODO Logout
  {
    //
  }

  /**
   * Creat a new user account.
   *
   * @param  Request  $request
   * @return Response
   */
  public function register(Request $request) // TODO Register
  {
    //
  }

  /**
   * Display the specified user account.
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
            ->load('comments')
        );
        break;
      case 'people':
        // Return all people attached to the user.
        return new UserPeopleResource(
          $user->people
            ->load('taxonomies')
            ->load('likes')
            ->load('favorites')
            ->load('comments')
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
            ->load('comments')
        );
        break;
      case 'comments':
        // Return all comments attached to the user.
        return new UserCommentsResource(
          $user->comments
            ->load('event')
            ->load('person')
            ->load('venue')
            ->load('likes')
        );
        break;
      case 'likes':
        // Return all likes attached to the user.
        return new UserLikesResource(
          $user->likes
            ->load('event')
            ->load('person')
            ->load('venue')
            ->load('comment')
        );
        break;
      case 'favorites':
        // Return all favorites attached to the user.
        return new UserFavoritesResource(
          $user->favorites
            ->load('event')
            ->load('person')
            ->load('venue')
        );
        break;
      case 'files':
        // Return all files attached to the user.
        return new UserFilesResource(
          $user->files
        );
        break;
      case 'tickets':
        // Return all tickets attached to the user.
        return new UserTicketsResource(
          $user->tickets
            ->load('addresses')
            ->load('emails')
            ->load('phones')
            ->load('event')
            ->load('event.dates')
        );
        break;
      default:
        // Return the user data.
        return new UserResource($user);
    }
  }

  /**
   * Update the specified user account.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) // TODO Update
  {
    //
  }

  /**
   * Remove the specified user account.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) // TODO Destroy
  {
    //
  }
}

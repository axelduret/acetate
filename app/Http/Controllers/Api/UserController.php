<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Comment;
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
use App\Http\Resources\UserFavoritesResource;
use App\Http\Resources\UserCommentsCollection;

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
   * User's contents.
   *
   * @var array
   */
  protected $contents = ['events', 'people', 'venues', 'files', 'tickets', 'comments', 'likes', 'favorites'];

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
    $sortableFields = in_array($sortField, $this->sortFields) ? $sortField : 'id';
    $orderField = $request->input('order_by');
    $sortOrder = in_array($orderField, ['asc', 'desc']) ? $orderField : 'asc';
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
    // Check if users exist.
    if ($users == '') {
      return $this->failure('No users were found.', 404);
    }
    // Format data.
    return new UserCollection($users);
  }

  /**
   * User login.
   *
   * @param  int  $id
   * @return Response
   */
  public function login($id) // TODO Login
  {
    //
  }

  /**
   * User logout.
   *
   * @param  int  $id
   * @return Response
   */
  public function logout($id) // TODO Logout
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
   * @param  int  $id
   * @param  string  $content
   * @param  Request  $request
   * @return Response
   */
  public function show(int $id, $content = null, Request $request)
  {
    $contentField = in_array($content, $this->contents) ? $content : null;

    // Check if the user exists.
    $user = User::find($id);
    if (!$user) {
      return $this->failure('User not found.', 404);
    }

    switch ($contentField) {
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
        // Pagination.
        $perPage = $request->input('per_page') ?? 10;
        // Return all comments attached to the user.
        return new UserCommentsCollection(
          Comment::where('user_id', $id)->paginate((int)$perPage)
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
   * @param  int  $id
   * @param  Request  $request
   * @return Response
   */
  public function update($id, Request $request) // TODO Update
  {
    //
  }

  /**
   * Remove the specified user account.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id) // TODO Destroy
  {
    //
  }
}

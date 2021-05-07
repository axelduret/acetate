<?php

namespace App\Http\Controllers\Api;

use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Traits\AvatarTrait;
use App\Http\Traits\EntityTrait;
use App\Http\Traits\WebsiteTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\VenueResource;
use App\Http\Resources\VenueCollection;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\RespondsWithHttpStatus;

class VenueController extends Controller
{
  // Import custom response trait.
  use RespondsWithHttpStatus;
  // Import Entity trait.
  use EntityTrait;
  // Import Avatar trait.
  use AvatarTrait;
  // Import Website trait.
  use WebsiteTrait;

  // Pagination.
  const PER_PAGE = 10;

  /**
   * Response messages.
   *
   * @var array
   */
  protected $messages = [];

  /**
   * Warning messages.
   *
   * @var array
   */
  protected $warning = [];

  /**
   * Attached relationships.
   *
   * @var array
   */
  protected $related = ['user', 'event', 'people', 'ticket'];

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
    // Retrieve and sort data.
    $sortField = in_array(
      $request->input('sort_by'),
      $this->sortFields
    ) // Accepted values.
      ? $request->input('sort_by') // Submitted value.
      : 'name'; // Default value.
    $sortOrder = in_array(
      $request->input('order_by'),
      ['asc', 'desc']
    ) // Accepted values.
      ? $request->input('order_by') // Submitted value.
      : 'asc'; // Default value.
    $query = Venue::orderBy($sortField, $sortOrder);
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
    $searchValue = $request->input('search_value');
    $searchField = in_array(
      $request->input('search_field'),
      $this->searchFields
    ) // Accepted values.
      ? $request->input('search_field') // Submitted value.
      : null; // Default value.
    if (!is_null($searchValue) && !is_null($searchField)) {
      $searchQuery = "%$searchValue%";
      $query = $query->where($searchField, 'like', $searchQuery);
    }
    // Pagination.
    $perPage = $request->input('per_page') ?? self::PER_PAGE;
    $venues = $query->paginate((int)$perPage);
    // Check if people exist.
    if ($venues->isEmpty()) {
      return $this->failure('No venues found.', 404);
    }
    /* TODO add pagination to response.
    // Success message.
    $message = 'OK';
    // Returns venues data with success message.
    return $this->success($message, new VenueCollection($venues), 200);
     */
    // Returns venues data.
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
    // TODO
  }

  /**
   * Display the specified venue.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    // Check if the venue exists.
    $venue = Venue::find($id);
    if (!$venue) {
      return $this->failure('Venue ' . $id . ' not found.', 404);
    }
    // Success message.
    $message = 'OK';
    // Returns the venue data with success message.
    return $this->success($message, new VenueResource($venue), 200);
  }

  /**
   * Update the specified venue.
   *
   * @param  int  $id
   * @param  Request  $request
   * @return Response
   */
  public function update($id, Request $request)
  {
    // TODO
  }

  /**
   * Remove the specified venue.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    // Load the venue.
    $venue = Venue::find($id);
    // Check if the venue exists.
    if (!$venue) {
      return $this->failure('Venue ' . $id . ' not found.', 404);
    }
    // Delete the venue's avatar.
    $this->deleteAvatar($venue);
    // Detach people from the venue.
    $venue->people()->detach();
    // Detach events from the venue.
    $venue->events()->detach();
    // Detach addresses from the venue.
    $this->detachEntity($venue, 'venue', 'addresses');
    // Delete addresses from the venue.
    $this->deleteEntity($venue, $this->related, 'addresses');
    // Detach emails from the venue.
    $this->detachEntity($venue, 'venue', 'emails');
    // Delete emails from the venue.
    $this->deleteEntity($venue, $this->related, 'emails');
    // Detach phones from the venue.
    $this->detachEntity($venue, 'venue', 'phones');
    // Delete phones from the venue.
    $this->deleteEntity($venue, $this->related, 'phones');
    // Detach files from the venue.
    $this->detachEntity($venue, 'venue', 'files');
    // Delete files from the venue.
    $this->deleteEntity($venue, $this->related, 'files');
    // Detach taxonomies from the venue.
    $venue->taxonomies()->detach();
    // Detach websites from the venue.
    $this->detachEntity($venue, 'venue', 'websites');
    // Delete websites from the venue.
    $this->deleteEntity($venue, $this->related, 'websites');
    // Delete the venue.
    $venue->delete();
    // Success message.
    $message = 'Venue ' . $id . ' removed successfully.';
    // Returns success message.
    return $this->success($message, null, 200);
  }

  /**
   * Validators.
   *
   * @param  bool $update
   * @return array
   */
  protected function validators($update = false)
  {
    // TODO
    $validatorRules = [];
    // Validators for all submitted fields.
    $validatorRules = [];
    // Validate id when update method is requested.
    if ($update) {
      $validatorRules['id'] = 'required|integer|digits_between:1,20';
    }
    return $validatorRules;
  }
}

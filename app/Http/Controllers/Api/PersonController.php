<?php

namespace App\Http\Controllers\Api;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Traits\AvatarTrait;
use App\Http\Traits\EntityTrait;
use App\Http\Traits\WebsiteTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonCollection;
use App\Http\Traits\RespondsWithHttpStatus;

class PersonController extends Controller
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
  const PER_PAGE = 20;

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
  protected $related = ['user', 'event', 'venue', 'ticket'];

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
    // Retrieve and sort data.
    $sortField = in_array(
      $request->input('sort_by'),
      $this->sortFields
    ) // Accepted values.
      ? $request->input('sort_by') // Submitted value.
      : 'nickname'; // Default value.
    $sortOrder = in_array(
      $request->input('order_by'),
      ['asc', 'desc']
    ) // Accepted values.
      ? $request->input('order_by') // Submitted value.
      : 'asc'; // Default value.
    $query = Person::orderBy($sortField, $sortOrder);
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
    $people = $query->paginate((int)$perPage);

    // Check if people exist.
    if ($people->isEmpty()) {
      return $this->failure('No people found.', 404);
    }
    // Success message.
    $message = 'OK';
    // Returns people data with success message.
    return $this->success($message, new PersonCollection($people), 200);
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
  public function show($id)
  {
    // Check if the person exists.
    $person = Person::find($id);
    if (!$person) {
      return $this->failure('Person not found.', 404);
    }
    // Success message.
    $message = 'OK';
    // Returns the person data with success message.
    return $this->success($message, new PersonResource($person), 200);
  }

  /**
   * Update the specified person.
   *
   * @param  int  $id
   * @param  Request  $request
   * @return Response
   */
  public function update($id, Request $request)
  {
    //
  }

  /**
   * Remove the specified person.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    // Load the person.
    $person = Person::find($id);
    // Check if the person exists.
    if (!$person) {
      return $this->failure('Person not found.', 404);
    }
    // Delete the person's avatar.
    $this->deleteAvatar($person);
    // Detach venues from the person.
    $person->venues()->detach();
    // Detach events from the person.
    $person->events()->detach();
    // Detach addresses from the person.
    $this->detachEntity($person, 'person', 'addresses');
    // Delete addresses from the person.
    $this->deleteEntity($person, $this->related, 'addresses');
    // Detach emails from the person.
    $this->detachEntity($person, 'person', 'emails');
    // Delete emails from the person.
    $this->deleteEntity($person, $this->related, 'emails');
    // Detach phones from the person.
    $this->detachEntity($person, 'person', 'phones');
    // Delete phones from the person.
    $this->deleteEntity($person, $this->related, 'phones');
    // Detach files from the person.
    $this->detachEntity($person, 'person', 'files');
    // Delete files from the person.
    $this->deleteEntity($person, $this->related, 'files');
    // Detach taxonomies from the person.
    $person->taxonomies()->detach();
    // Detach websites from the person.
    $this->detachEntity($person, 'person', 'websites');
    // Delete websites from the person.
    $this->deleteEntity($person, $this->related, 'websites');
    // Delete the person.
    $person->delete();
    // Success message.
    $message = 'Person removed successfully.';
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

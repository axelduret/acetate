<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Models\User;

class UserController extends Controller
{
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
   * Display a list of users.
   *
   * @param Request $request
   * @return Response
   */
  public function index(Request $request)
  {
    // Retrieve the data and sort it.
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

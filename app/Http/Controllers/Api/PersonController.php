<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RespondsWithHttpStatus;

class PersonController extends Controller
{
  // Import custom response trait.
  use RespondsWithHttpStatus;

  /**
   * Display the list of all people.
   *
   * @param Request $request
   * @return Response
   */
  public function index(Request $request)
  {
    //
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
    //
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

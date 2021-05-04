<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RespondsWithHttpStatus;

class VenueController extends Controller
{
  // Import custom response trait.
  use RespondsWithHttpStatus;

  /**
   * Display the list of all venues.
   *
   * @param Request $request
   * @return Response
   */
  public function index(Request $request)
  {
    //
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
    //
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

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class VenueCollection extends ResourceCollection
{
  /**
   * Transform the resource collection into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    return [
      $this::$wrap => $this->collection,
    ];
  }

  /**
   * The "data" wrapper that should be applied.
   *
   * @var string
   */
  public static $wrap = 'venues';
}
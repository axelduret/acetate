<?php

namespace App\Http\Resources;

use App\Http\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class UserVenuesResource extends JsonResource
{

  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    return parent::toArray($request);
  }

  /**
   * The "data" wrapper that should be applied.
   *
   * @var string
   */
  public static $wrap = 'user_venues';
}

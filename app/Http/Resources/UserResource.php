<?php

namespace App\Http\Resources;

use App\Models\SocialNetwork;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
   * Get additional data that should be returned with the resource array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function with($request)
  {
    return [
      $this::$wrap => [
        'addresses' => $this->addresses,
        'emails' => $this->emails,
        'phones' => $this->phones,
        'websites' => $this->websites->load('socialNetwork'),
      ]
    ];
  }

  /**
   * The "data" wrapper that should be applied.
   *
   * @var string
   */
  public static $wrap = 'user';
}

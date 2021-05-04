<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VenueResource extends JsonResource
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
        'files' => $this->files,
        'events' => $this->events->load('dates'),
        'taxonomies' => $this->taxonomies,
        'comments' => $this->comments,
        // TODO show likes of the logged user.
        'likes_count' => $this->likes->where('is_dislike', 0)->count(),
        // TODO show dislikes of the logged user.
        'dislikes_count' => $this->likes->where('is_dislike', 1)->count(),
        // TODO show favorites only if the user is logged in.
        'favorites' => $this->favorites,
        'user' => $this->user->id,
      ],
      'credit' => env('APP_CREDIT'),
      'website' => env('APP_URL'),
      'licence' => env('APP_LICENCE'),
      'timezone' => env('TIME_ZONE'),
    ];
  }

  /**
   * The "data" wrapper that should be applied.
   *
   * @var string
   */
  public static $wrap = 'venue';
}

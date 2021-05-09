<?php

namespace App\Http\Traits;

use \Illuminate\Http\Response;

trait CreditTrait
{
  /**
   * Returns API credit.
   *
   * @return Response
   */
  protected function apiCredit()
  {
    return collect(
      [
        'APP name' => env('MIX_APP_NAME'),
        'APP url' => env('APP_URL'),
        'APP timezone' => env('TIME_ZONE'),
        'developped by' => env('APP_CREDIT'),
        'licence' => env('APP_LICENCE'),
      ]
    );
  }
}

<?php

namespace Database\Factories;

use App\Models\Date;
use Illuminate\Database\Eloquent\Factories\Factory;

class DateFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Date::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'start_date' => $this->faker->date('Y-m-d', '+3 years'),
      'end_date' => $this->faker->date('Y-m-d', '+3 years'),
      'start_time' => $this->faker->time('H:i:s'),
      'end_time' => $this->faker->time('H:i:s'),
    ];
  }
}

<?php

namespace Database\Factories;

use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Price::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'type' => $this->faker->randomElement(['adult', 'child', 'family', 'group', 'primary', 'secondary']),
      'name' => $this->faker->sentence(4),
      'description' => $this->faker->text,
      'cost' => $this->faker->randomFloat(2, 1, 1000),
      'event_id' => $this->faker->numberBetween(1, 20),
    ];
  }
}

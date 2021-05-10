<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Event::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $dir = 'storage/app/avatar/event';
    return [
      'name' => $this->faker->sentence(4),
      'description' => $this->faker->text(512),
      'avatar' => $this->faker->image($dir),
    ];
  }
}

<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Person::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $dir = 'app/avatar/person';
    return [
      'nickname' => $this->faker->unique()->userName,
      'firstname' => $this->faker->firstName,
      'lastname' => $this->faker->lastName,
      'description' => $this->faker->text,
      'type' => $this->faker->randomElement(['owner', 'organiser', 'promoter', 'contact', 'presenter', 'artist', 'guest']),
      'avatar' => $this->faker->image(storage_path($dir)),
      'company' => $this->faker->company,
      'user_id' => $this->faker->numberBetween(1, 20),
    ];
  }
}

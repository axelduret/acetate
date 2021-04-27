<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Address::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'type' => $this->faker->randomElement(['main', 'secondary', 'tertiary', 'company', 'event', 'venue', 'person']),
      'street1' => $this->faker->streetAddress,
      'street2' => $this->faker->secondaryAddress,
      'zip' => $this->faker->postcode,
      'canton' => $this->faker->randomElement([
        'Appenzell Inner-Rhodes', 'Appenzell Outer-Rhodes', 'Argovia', 'Basel-City', 'Basel-Country', 'Berne', 'Friburg',
        'Geneva', 'Glarus', 'Grisons', 'Jura', 'Lucerne', 'Neuchâtel', 'Nidwald', 'Obwald', 'Schaffhouse', 'Schwyz', 'Soleure', 'St. Gall', 'Tessin',
        'Thurgovia', 'Uri', 'Vaud', 'Wallis', 'Zoug', 'Zurich'
      ]),
      'region' => $this->faker->region,
      'city' => $this->faker->city,
      'country' => $this->faker->country,
      'firstname' => $this->faker->firstName,
      'lastname' => $this->faker->lastName,
      'longitude' => $this->faker->longitude,
      'latitude' => $this->faker->latitude,
      'company' => $this->faker->company,
    ];
  }
}

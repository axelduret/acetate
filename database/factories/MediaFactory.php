<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Media::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $dir = 'app/media';
    return [
      'path' => $this->faker->image(storage_path($dir)),
      'type' => $this->faker->randomElement(['image', 'audio', 'video']),
      'mimetype' => $this->faker->mimeType,
      'encoding' => '8bit',
      'name' => $this->faker->word,
    ];
  }
}

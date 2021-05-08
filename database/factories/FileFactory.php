<?php

namespace Database\Factories;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = File::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $dir = 'app/file';
    $upload = $this->faker->image(storage_path($dir));
    return [
      'path' => $upload,
      'type' => $this->faker->randomElement(['image', 'audio', 'video']),
      'mimetype' => $this->faker->mimeType,
      'encoding' => '8bit',
      'name' => $this->faker->word,
      'size' => fileSize($upload),
    ];
  }
}

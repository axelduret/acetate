<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // Create 'storage/app/avatar/user' directory if doesn't exist.
    $dir = 'app/avatar/user';
    if (!Storage::directories('avatar/user')) {
      Storage::makeDirectory('avatar/user');
    }
    // Clean 'storage/app/avatar/user' directory before seeding files.
    $file = new Filesystem;
    $file->cleanDirectory(storage_path($dir));


    // Create users
    $users = User::factory()
      ->count(10)
      ->create();
  }
}

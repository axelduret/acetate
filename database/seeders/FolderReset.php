<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FolderReset extends Seeder
{
  /**
   * Reset the application's storage folders.
   *
   * @return void
   */
  public function run()
  {

    // Clean '/public/avatar/user' directory before seeding files.
    Storage::deleteDirectory('public/avatar/user');

    // Clean '/public/avatar/person' directory before seeding files.
    Storage::deleteDirectory('public/avatar/person');

    // Clean '/public/avatar/event' directory before seeding files.
    Storage::deleteDirectory('public/avatar/event');

    // Clean '/public/avatar/venue' directory before seeding files.
    Storage::deleteDirectory('public/avatar/venue');

    // Clean '/public/file' directory before seeding files.
    Storage::deleteDirectory('public/file');

    // Create 'public/avatar/user' directory if doesn't exist.
    if (!Storage::directories('public/avatar/user')) {
      Storage::makeDirectory('public/avatar/user');
    }

    // Create 'public/avatar/event' directory if doesn't exist.
    if (!Storage::directories('public/avatar/event')) {
      Storage::makeDirectory('public/avatar/event');
    }

    // Create 'public/avatar/person' directory if doesn't exist.
    if (!Storage::directories('public/avatar/person')) {
      Storage::makeDirectory('public/avatar/person');
    }

    // Create 'public/avatar/venue' directory if doesn't exist.
    if (!Storage::directories('public/avatar/venue')) {
      Storage::makeDirectory('public/avatar/venue');
    }

    // Create 'public/file' directory if doesn't exist.
    if (!Storage::directories('public/file')) {
      Storage::makeDirectory('public/file');
    }
  }
}

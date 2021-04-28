<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class FolderReset extends Seeder
{
  /**
   * Reset the application's storgae folders.
   *
   * @return void
   */
  public function run()
  {
    // Create 'storage/app/avatar/user' directory if doesn't exist.
    $userdir = 'app/avatar/user';
    if (!Storage::directories('avatar/user')) {
      Storage::makeDirectory('avatar/user');
    }

    // Create 'storage/app/avatar/event' directory if doesn't exist.
    $eventdir = 'app/avatar/event';
    if (!Storage::directories('avatar/event')) {
      Storage::makeDirectory('avatar/event');
    }

    // Create 'storage/app/avatar/person' directory if doesn't exist.
    $persondir = 'app/avatar/person';
    if (!Storage::directories('avatar/person')) {
      Storage::makeDirectory('avatar/person');
    }

    // Create 'storage/app/avatar/venue' directory if doesn't exist.
    $venuedir = 'app/avatar/venue';
    if (!Storage::directories('avatar/venue')) {
      Storage::makeDirectory('avatar/venue');
    }

    // Create 'storage/app/file' directory if doesn't exist.
    $filedir = 'app/file';
    if (!Storage::directories('file')) {
      Storage::makeDirectory('file');
    }

    $file = new Filesystem;

    // Clean 'storage/app/avatar/user' directory before seeding files.
    $file->cleanDirectory(storage_path($userdir));

    // Clean 'storage/app/avatar/person' directory before seeding files.
    $file->cleanDirectory(storage_path($persondir));

    // Clean 'storage/app/avatar/event' directory before seeding files.
    $file->cleanDirectory(storage_path($eventdir));

    // Clean 'storage/app/avatar/venue' directory before seeding files.
    $file->cleanDirectory(storage_path($venuedir));

    // Clean 'storage/app/file' directory before seeding files.
    $file->cleanDirectory(storage_path($filedir));
  }
}

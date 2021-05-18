<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;
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
    // Create 'public/avatar/user' directory if doesn't exist.
    $userdir = 'public/avatar/user';
    if (!Storage::directories('public/avatar/user')) {
      Storage::makeDirectory('public/avatar/user');
    }

    // Create 'public/avatar/event' directory if doesn't exist.
    $eventdir = 'public/avatar/event';
    if (!Storage::directories('public/avatar/event')) {
      Storage::makeDirectory('public/avatar/event');
    }

    // Create 'public/avatar/person' directory if doesn't exist.
    $persondir = 'public/avatar/person';
    if (!Storage::directories('public/avatar/person')) {
      Storage::makeDirectory('public/avatar/person');
    }

    // Create 'public/avatar/venue' directory if doesn't exist.
    $venuedir = 'public/avatar/venue';
    if (!Storage::directories('public/avatar/venue')) {
      Storage::makeDirectory('public/avatar/venue');
    }

    // Create 'public/file' directory if doesn't exist.
    $filedir = 'public/file';
    if (!Storage::directories('public/file')) {
      Storage::makeDirectory('public/file');
    }

    $file = new Filesystem;

    // Clean '/public/avatar/user' directory before seeding files.
    $file->cleanDirectory(storage_path($userdir));

    // Clean '/public/avatar/person' directory before seeding files.
    $file->cleanDirectory(storage_path($persondir));

    // Clean '/public/avatar/event' directory before seeding files.
    $file->cleanDirectory(storage_path($eventdir));

    // Clean '/public/avatar/venue' directory before seeding files.
    $file->cleanDirectory(storage_path($venuedir));

    // Clean '/public/file' directory before seeding files.
    $file->cleanDirectory(storage_path($filedir));
  }
}

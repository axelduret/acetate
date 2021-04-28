<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Comment;
use App\Models\Date;
use App\Models\Email;
use App\Models\Event;
use App\Models\Favorite;
use App\Models\File;
use App\Models\Like;
use App\Models\Media;
use App\Models\Person;
use App\Models\Phone;
use App\Models\Price;
use App\Models\SocialNetwork;
use App\Models\User;
use App\Models\Website;
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

    // Clean 'storage/app/file' directory before seeding files.
    $file->cleanDirectory(storage_path($filedir));

    // Create users
    $users = User::factory()
      ->count(20)
      ->create();

    // Create events
    $events = Event::factory()
      ->count(20)
      ->create();

    // Create people
    $people = Person::factory()
      ->count(20)
      ->create();

    // Create addresses
    $addresses = Address::factory()
      ->count(20)
      ->create();

    // Create phones
    $phones = Phone::factory()
      ->count(20)
      ->create();

    // Create websites
    $websites = Website::factory()
      ->count(20)
      ->create();

    // Create comments
    $comments = Comment::factory()
      ->count(20)
      ->create();

    // Create files
    $files = File::factory()
      ->count(20)
      ->create();

    // Create dates
    $dates = Date::factory()
      ->count(20)
      ->create();

    // Create prices
    $prices = Price::factory()
      ->count(20)
      ->create();

    // Create emails
    $emails = Email::factory()
      ->count(20)
      ->create();

    // Create favorites
    $favorites = Favorite::factory()
      ->count(20)
      ->create();

    // Create likes
    $likes = Like::factory()
      ->count(20)
      ->create();

    // Create social_networks
    $social_networks = SocialNetwork::factory()
      ->count(20)
      ->create();
  }
}

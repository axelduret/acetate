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
use App\Models\Person;
use App\Models\Phone;
use App\Models\Price;
use App\Models\SocialNetwork;
use App\Models\Taxonomy;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Venue;
use App\Models\Website;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // Reset the application's storage folders.
    $this->call(FolderReset::class);

    // Create users.
    $users = User::factory()
      ->count(20)
      ->create();

    // Create events.
    $events = Event::factory()
      ->count(20)
      ->make()->each(function ($event) use ($users) {
        // Attach a random user_id to each event.
        $event->user_id = $users->random()->id;
        $event->save();
      });

    // Create people.
    $people = Person::factory()
      ->count(20)
      ->make()->each(function ($person) use ($users) {
        // Attach a random user_id to each person.
        $person->user_id = $users->random()->id;
        $person->save();
      });

    // Create venues.
    $venues = Venue::factory()
      ->count(20)
      ->make()->each(function ($venue) use ($users) {
        // Attach a random user_id to each venue.
        $venue->user_id = $users->random()->id;
        $venue->save();
      });

    // Create comments.
    $comments = Comment::factory()
      ->count(20)
      ->make()->each(function ($comment) use ($users) {
        // Attach a random user_id to each comment.
        $comment->user_id = $users->random()->id;
        $comment->save();
      });

    // Create files.
    $files = File::factory()
      ->count(20)
      ->create();

    // Create dates.
    $dates = Date::factory()
      ->count(20)
      ->make()->each(function ($date) use ($events) {
        // Attach a random event_id to each date.
        $date->event_id = $events->random()->id;
        $date->save();
      });

    // Create prices.
    $prices = Price::factory()
      ->count(20)
      ->make()->each(function ($price) use ($events) {
        // Attach a random event_id to each price.
        $price->event_id = $events->random()->id;
        $price->save();
      });

    // Create favorites.
    $favorites = Favorite::factory()
      ->count(20)
      ->make()->each(function ($favorite) use ($users) {
        // Attach a random user_id to each favorite.
        $favorite->user_id = $users->random()->id;
        $favorite->save();
      });

    // Create likes.
    $likes = Like::factory()
      ->count(20)
      ->make()->each(function ($like) use ($users) {
        // Attach a random user_id to each like.
        $like->user_id = $users->random()->id;
        $like->save();
      });

    // Create taxonomies.
    $taxonomies = Taxonomy::factory()
      ->count(20)
      ->create();

    // Create tickets.
    $tickets = Ticket::factory()
      ->count(20)
      ->make()->each(function ($ticket) use ($users, $events) {
        // Attach a random user_id to each ticket.
        $ticket->user_id = $users->random()->id;
        // Attach a random event_id to each ticket.
        $ticket->event_id = $events->random()->id;
        $ticket->save();
      });

    // Create addresses.
    $addresses = Address::factory()
      ->count(100)
      ->make()->each(function ($address) use ($users, $events, $people, $venues, $tickets) {
        if ($address->type == 'event') {
          // Attach a random event_id to the address.
          $address->event_id = $events->random()->id;
          $address->save();
        } elseif ($address->type == 'person') {
          // Attach a random person_id to the address.
          $address->person_id = $people->random()->id;
          $address->save();
        } elseif ($address->type == 'venue') {
          // Attach a random venue_id to the address.
          $address->venue_id = $venues->random()->id;
          $address->save();
        } elseif ($address->type == 'ticket') {
          // Attach a random ticket_id to the address.
          $address->ticket_id = $tickets->random()->id;
          $address->save();
        } else {
          // Attach a random user_id to the address.
          $address->user_id = $users->random()->id;
          $address->save();
        }
      });

    // Create emails.
    $emails = Email::factory()
      ->count(100)
      ->make()->each(function ($email) use ($users, $events, $people, $venues, $tickets) {
        $random = rand(1, 5);
        if ($random == 1) {
          // Attach a random event_id to the email.
          $email->event_id = $events->random()->id;
          $email->save();
        } elseif ($random == 2) {
          // Attach a random person_id to the email.
          $email->person_id = $people->random()->id;
          $email->save();
        } elseif ($random == 3) {
          // Attach a random venue_id to the email.
          $email->venue_id = $venues->random()->id;
          $email->save();
        } elseif ($random == 4) {
          // Attach a random ticket_id to the email.
          $email->ticket_id = $tickets->random()->id;
          $email->save();
        } else {
          // Attach a random user_id to the email.
          $email->user_id = $users->random()->id;
          $email->save();
        }
      });

    // Create phones.
    $phones = Phone::factory()
      ->count(100)
      ->make()->each(function ($phone) use ($users, $events, $people, $venues, $tickets) {
        $random = rand(1, 5);
        if ($random == 1) {
          // Attach a random event_id to the phone.
          $phone->event_id = $events->random()->id;
          $phone->save();
        } elseif ($random == 2) {
          // Attach a random person_id to the phone.
          $phone->person_id = $people->random()->id;
          $phone->save();
        } elseif ($random == 3) {
          // Attach a random venue_id to the phone.
          $phone->venue_id = $venues->random()->id;
          $phone->save();
        } elseif ($random == 4) {
          // Attach a random ticket_id to the phone.
          $phone->ticket_id = $tickets->random()->id;
          $phone->save();
        } else {
          // Attach a random user_id to the phone.
          $phone->user_id = $users->random()->id;
          $phone->save();
        }
      });

    // Create websites.
    $websites = Website::factory()
      ->count(100)
      ->make()->each(function ($website) use ($users, $events, $people, $venues) {
        $random = rand(1, 4);
        if ($random == 1) {
          // Attach a random event_id to the website.
          $website->event_id = $events->random()->id;
          $website->save();
        } elseif ($random == 2) {
          // Attach a random person_id to the website.
          $website->person_id = $people->random()->id;
          $website->save();
        } elseif ($random == 3) {
          // Attach a random venue_id to the website.
          $website->venue_id = $venues->random()->id;
          $website->save();
        } else {
          // Attach a random user_id to the website.
          $website->user_id = $users->random()->id;
          $website->save();
        }
        if ($website->type == 'social network') {
          // Create a social_network.
          $social_network = SocialNetwork::factory()->make();
          // Attach the website_id to the social_network.
          $social_network->website_id = $website->id;
          $social_network->save();
        }
      });
  }
}

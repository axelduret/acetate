<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
  /**
   * Create a super-admin.
   *
   * @return void
   */
  public function run()
  {
    $faker = Factory::create(config('app.faker_locale'));
    $dir = 'storage/app/public/avatar/user';
    $admin = new User([
      'username' => env('ADMIN_USERNAME'),
      'firstname' => env('ADMIN_FIRSTNAME'),
      'lastname' => env('ADMIN_LASTNAME'),
      'language' => env('ADMIN_LANG'),
      'theme' => env('ADMIN_THEME'),
      'avatar' => $faker->image('public/storage/avatar/user', 640, 480, null, false),
      'company' => env('ADMIN_COMPANY'),
      'email' => env('ADMIN_EMAIL'),
      'email_verified_at' => now(),
      'password'  => Hash::make(env('ADMIN_PASSWORD')),
    ]);
    $admin->save();
    $admin->assignRole('super-admin');
    // Create a super-admin api-token and attach it to the super-admin.
    $admin->createToken('api_token', ['*']);
    // Create a global api-token and attach it to the super-admin.
    $app_token = $admin->createToken('api_token', ['role:anonymous']);
    $admin->remember_token = $app_token->plainTextToken;
    $admin->save();
  }
}

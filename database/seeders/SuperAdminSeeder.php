<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
    $admin = new User([
      'username' => env('ADMIN_USERNAME'),
      'firstname' => env('ADMIN_FIRSTNAME'),
      'lastname' => env('ADMIN_LASTNAME'),
      'language' => env('ADMIN_LANG'),
      'theme' => env('ADMIN_THEME'),
      'avatar' => '',
      'company' => env('ADMIN_COMPANY'),
      'email' => env('ADMIN_EMAIL'),
      'email_verified_at' => now(),
      'password'  => Hash::make(env('ADMIN_PASSWORD')),
      'remember_token' => Str::random(10),
    ]);
    $admin->assignRole('super-admin');
    $admin->save();
    // Create a super-admin api-token and attach it to the super-admin.
    $admin->createToken('api_token', ['role:super-admin']);
    // Create a global api-token and attach it to the super-admin.
    $admin->createToken('api_token', ['role:anonymous']);
  }
}

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
      'username' => 'admin',
      'firstname' => 'Super',
      'lastname' => 'Admin',
      'language' => 'fr',
      'theme' => 'dark',
      'avatar' => '',
      'company' => 'Acetate',
      'email' => 'admin@acetate.ch',
      'email_verified_at' => now(),
      'password'  => Hash::make('admin'),
      'remember_token' => Str::random(10),
    ]);
    $admin->assignRole('super-admin');
    $admin->save();
  }
}

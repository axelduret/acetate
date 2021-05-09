<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

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
      'password'  => Hash::make('admin')
    ]);
    $admin->assignRole('super-admin');
    $admin->save();
  }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermission extends Seeder
{
  /**
   * Reset the application's storage folders.
   *
   * @return void
   */
  public function run()
  {
    // Reset cached roles and permissions.
    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    // Create new roles.
    $member = Role::create(['name' => 'member']);
    $contributor = Role::create(['name' => 'contributor']);
    $admin = Role::create(['name' => 'super-admin']);
    // Create new permissions.
    $comments = Permission::create(['name' => 'comments']);
    $likes = Permission::create(['name' => 'likes']);
    $posts = Permission::create(['name' => 'posts']);
    // Attach permissions to roles.
    $member->syncPermissions([$comments, $likes]);
    $contributor->syncPermissions([$comments, $likes, $posts]);
  }
}

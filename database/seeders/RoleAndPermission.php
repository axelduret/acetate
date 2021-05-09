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
    Permission::create(['name' => 'comments']);
    Permission::create(['name' => 'comments.add']);
    Permission::create(['name' => 'comments.edit']);
    Permission::create(['name' => 'comments.delete']);
    Permission::create(['name' => 'likes']);
    Permission::create(['name' => 'likes.add']);
    Permission::create(['name' => 'likes.edit']);
    Permission::create(['name' => 'likes.delete']);
    Permission::create(['name' => 'posts']);
    Permission::create(['name' => 'posts.add']);
    Permission::create(['name' => 'posts.edit']);
    Permission::create(['name' => 'posts.delete']);
    // Attach permissions to roles.
    $member->syncPermissions('comments', 'likes');
    $contributor->syncPermissions('comments', 'likes', 'posts');
  }
}

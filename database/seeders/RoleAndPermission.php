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
    $writeComment = Permission::create(['name' => 'write comment']);
    $editComment = Permission::create(['name' => 'edit comment']);
    $deleteComment = Permission::create(['name' => 'delete comment']);
    $addLike = Permission::create(['name' => 'add like']);
    $editLike = Permission::create(['name' => 'edit like']);
    $deleteLike = Permission::create(['name' => 'delete like']);
    $writePost = Permission::create(['name' => 'write post']);
    $editPost = Permission::create(['name' => 'edit post']);
    $deletePost = Permission::create(['name' => 'delete post']);
    // Attach permissions to roles.
    $memberPermissions = [$writeComment, $editComment, $deleteComment, $addLike, $editLike, $deleteLike];
    $contributorPermissions = [$memberPermissions, $writePost, $editPost, $deletePost];
    $member->syncPermissions($memberPermissions);
    $contributor->syncPermissions($contributorPermissions);
  }
}

<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
 // turn fk checking temp.
 DB::statement('SET FOREIGN_KEY_CHECKS=0;');
 // reset users table
 app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    DB::table('permissions')->truncate();
    DB::table('roles')->truncate();

    // insert roles
    Role::create([
    'name'=>'Super-Admin'
    ]);
    $reviewerRole = Role::create([
    'name'=>'Reviewer'
    ]);
    $sectorRole = Role::create([
        'name'=>'Sector-Checker'
    ]);
    $planningRole = Role::create([
        'name'=>'Planning-Checker'
    ]);

    // insert permissions
    $permissions = [
        'dashboard',
        'transactions',
        'transactions-list',
        'transactions-update',
        'users',
        'users-list',
        'users-create',
        'users-update',
        'users-delete',
        'roles',
        'roles-list',
        'roles-create',
        'roles-update',
        'roles-delete',
        'can-reject',
        'can-start',
        'can-close',
        'can-match',
        'can-pay',
        'can-register',
        'can-make-appointment',
        'can-update-to-network',
        'can-create-account',
        'can-execute',
        'can-complete',
        'can-archieve'
    ];
    foreach($permissions as $p)
    {
        Permission::create([
            'name'=>$p
        ]);
    }

    // assign permissions to each role
    // permissions for reviewer
    $perms = [
        'transactions',
        'transactions-list',
        'transactions-update',
        'users',
        'users-list',
        'can-reject',
        'can-start',
        'can-close',
        'can-match',
        'can-pay',
        'can-register',
    ];
    $reviewerRole->syncPermissions($perms);

    // permissions for sector user
    $perms = [
        'transactions',
        'transactions-list',
        'transactions-update',
        'can-make-appointment',
        'can-update-to-network',
    ];
    $sectorRole->syncPermissions($perms);

    // for planning role
    $perms = [
        'transactions',
        'transactions-list',
        'transactions-update',
        'can-create-account',
        'can-execute',
        'can-complete',
        'can-archieve'
    ];
    $planningRole->syncPermissions($perms);

 // turn on fk checking
 DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

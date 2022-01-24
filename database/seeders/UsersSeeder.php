<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // turn fk checking temp.
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // reset users table
        DB::table('users')->truncate();

        // add admin user
        $user = User::create([
            'fullname'=>'Fadi Ramzi Mohammed',
            'username'=>'fadi',
            'password'=>Hash::make('fadifadi')
        ]);
        // assign super-admin role to this model
        $user->assignRole('Super-Admin');

        // reviewer
        $user = User::create([
            'fullname'=>'Reviewer',
            'username'=>'reviewer1',
            'password'=>Hash::make('reviewreview')
        ]);
        // assign super-admin role to this model
        $user->assignRole('Reviewer');

        // sector
        $user = User::create([
            'fullname'=>'Sector Checker',
            'username'=>'sector',
            'password'=>Hash::make('sectorsector')
        ]);
        // assign super-admin role to this model
        $user->assignRole('Sector-Checker');
        // sector
        $user = User::create([
            'fullname'=>'Planning Checker',
            'username'=>'planning',
            'password'=>Hash::make('planplan')
        ]);
        // assign super-admin role to this model
        $user->assignRole('Planning-Checker');
        // turn on fk checking
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


    }
}

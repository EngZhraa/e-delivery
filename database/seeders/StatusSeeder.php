<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status')
        ->insert([
            ['name'=>'pending'],
            ['name'=>'rejected'],
            ['name'=>'matched'],
            ['name'=>'matched_and_paid'],
            ['name'=>'closed'],
            ['name'=>'registered'],
            ['name'=>'appointment'],
            ['name'=>'network_not_found'],
            ['name'=>'network_installed'],
            ['name'=>'account_created'],
            ['name'=>'executing'],
            ['name'=>'executed'],
            ['name'=>'completed']
            ,['name'=>'archeived']

        ]);
    }
}

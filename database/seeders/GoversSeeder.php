<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reading from file
        // insert to DB
        // code to insert some data
        DB::table('governorates')
        ->insert([
            [
                'name'=>'Baghdad'
            ],
            ['name'=>'Erbil'],
            ['name'=>'Albasrah'],
            ['name'=>'Karbalah'],
            ['name'=>'Anbar']
        ]);

    }
}

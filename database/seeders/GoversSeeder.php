<?php

namespace Database\Seeders;

use App\Models\Center;
use App\Models\Governorate;
use App\Models\Sector;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('governorates')->truncate(); // delete
        DB::table('centers')->truncate();
        DB::table('sectors')->truncate();
        // read data from csv file to array
        $file = Storage::disk('csv')->get('govers_.csv'); // return string
        // inserting
        $data = explode("\n",$file); // ['']
        $c=0;
        foreach($data as $key=>$value)
        {
            if($c==0)
            {
                $c = $c + 1;
              continue;  
            }
            // read line
            $newValue = explode(',',$value); // [1,baghdad, center, sector]
            $gover = Governorate::where('name','=',$newValue[1])->get()->first();
            if(!$gover)
            {
               $gover = Governorate::create([
                   'name'=>$newValue[1]
               ]); 
            }
            // insert Center to gover
            $center = Center::where('name','=',$newValue[2])->get()->first();
            if(!$center)
            {
                $center = Center::create([
                    'name'=>$newValue[2],
                    'gover_id' => $gover->id
                ]);
            }
            $sector = Sector::where('name','=',$newValue[3])->get()->first();
            if(!$sector)
            {
                $sector = Sector::create([
                    'name'=>$newValue[3],
                    'center_id' => $center->id
                ]);
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


    }
}

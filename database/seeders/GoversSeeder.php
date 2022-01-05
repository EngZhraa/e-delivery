<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Governorate;
use App\Models\Center;
use App\Models\Sector;
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
        DB::table('centers')->truncate(); // delete
        DB::table('sectors')->truncate(); // delete
        // load file of govers file
        $file = Storage::disk('csv')->get('govers_.csv');
      
        $data = explode("\n",$file);
        $c=0;
        foreach ($data as $key => $value) {
           if($c==0) // skip header line
           {
               $c = $c +1;
               continue;
           }
           
           $newValue = explode(',',$value); // spread line string to be array object
           // check governorate name befre insert it
         
           $gover = Governorate::where('name',$newValue[1])->get()->first();
           
           if(!$gover)
           {
               $gover = Governorate::create([
                   'name'=>$newValue[1]
               ]);
           }
         
           // now check center and get id of it
           $center = Center::where('name',$newValue[2])->get()->first();
           if(!$center)
           {
               $center = Center::create([
                   'name'=>$newValue[2],
                   'gover_id'=>$gover->id
               ]);
           }

           // now check sector and get it
           $sector = Sector::where('name', $newValue[3])->get()->first();
           if(!$sector)
           {
               Sector::create([
                   'name'=>$newValue[3],
                   'center_id'=>$center->id
               ]);
           }
        }
       
       
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


    }
}

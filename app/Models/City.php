<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    // 1- columns names
    // note: in case there is a fk, define a function of relashionship
    protected $fillable = [
        'name',
        'descr',
        'gover_id' // fk
    ];
    // 2- define table name
    protected $table = 'cities';

    // 3- define relashionships
    public function governorate()
    {
        return $this->belongsTo(Governorate::class,'gover_id');
    }

}

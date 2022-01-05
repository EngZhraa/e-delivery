<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    
    use HasFactory;
    // table name
    protected $table = 'governorates';
    // columns
    protected $fillable = [
        'name'
    ];

    // Governorate has many cities
    public function centers()
    {
        return $this->hasMany(Center::class,'gover_id');
    }
}

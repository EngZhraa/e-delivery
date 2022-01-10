<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gover_id'
    ];
    protected $table = 'centers';

    /**
     * Get the user that owns the Center
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function governorate()
    {
        return $this->belongsTo(Governorate::class,'gover_id');
    }
}

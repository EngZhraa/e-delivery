<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'trans_id',
        'fullname',
        'email',
        'phone',
        'mahala',
        'zokak',
        'dar',
        'nearest_point',
        'gover_id',
        'center_id',
        'sector_id',
        'status_id'
    ];
    protected $table = 'transactions';

    /**
     * Get the user that owns the Center
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history()
    {
        return $this->hasMany(TransactionHistory::class,'transaction_id');
    }
}

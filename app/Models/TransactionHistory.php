<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id',
        'status_id',
        'user_id',
        'reason'
        
    ];
    protected $table = 'trans_history';

    /**
     * Get the user that owns the Center
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'transaction_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function status()
    {
        return $this->belongsTo(status::class,'status_id');
    }
}

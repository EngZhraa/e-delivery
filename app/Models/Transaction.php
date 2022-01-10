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

    /**
     * Get all of the comments for the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history()
    {
        return $this->hasMany(TransactionHistory::class,'transaction_id');
    }
    /**
     * Get the user that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function governorate(): BelongsTo
    {
        return $this->belongsTo(Governorate::class, 'gover_id');
    }
    /**
     * The roles that belong to the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function center(): BelongsToMany
    {
        return $this->belongsToMany(Center::class, 'center_id');
    }
    /**
     * Get the sector that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}

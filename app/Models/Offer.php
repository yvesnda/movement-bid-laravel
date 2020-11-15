<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    /**
     *
     * Get the user that onwer the offer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Get bids that where bidded to this offer
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bids(){
        return $this->hasMany(Bid::class);
    }

    /**
     * Get the success bid
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function success_bid(){
        return $this->hasOne(Bid::class,'id','success_bid_id');
    }
}

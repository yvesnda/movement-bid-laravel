<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    /**
     * Get user that has created this bid
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Get offer that this bid is for
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function offer(){
        return $this->belongsTo(Offer::class);
    }
}

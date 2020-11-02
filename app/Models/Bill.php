<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $fillable = [
        'type',
        'amount',
        'campaign_id',
        'user_id',
    ];

    public function campaign()
    {
        return $this->belongsTo('App\Models\Campaign');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //
    protected $fillable = [
        'state',
        'type',
        'level',
        'request',
        'keyword_id',
        'campaign_id',
        'ad_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ad()
    {
        return $this->belongsTo('App\Models\Ad');
    }

    public function campaign()
    {
        return $this->belongsTo('App\Models\Campaign');
    }

    public function keyword()
    {
        return $this->belongsTo('App\Models\Keyword');
    }
}

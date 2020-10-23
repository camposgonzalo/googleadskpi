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
        'keyword_id',
        'campaign_id',
        'ad_id',
    ];

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'name',
        'objective',
        'url',
        'phone',
        'ad_schedule',
        'locations',
        'apply_billing',
        'mode',
        'type',
        'monthly_cost',
        'daily_cost',
        'campaign_id',
        'user_id',
        'active',
        'account_id',
        'group_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

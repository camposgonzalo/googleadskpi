<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        // 'campaign_id',
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
        // 'description',
    ];

}

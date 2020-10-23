<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //
    protected $fillable = [
        'title_one',
        'title_two',
        'description',
        'url',
        'group',
        'campaign',
    ];
}

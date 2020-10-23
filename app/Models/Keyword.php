<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    //
    protected $fillable = [
        'type',
        'keyword',
        'group',
        'campaign',
        'keyword_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['url', 'code', 'visits'];
    protected $casts = [
        'id' => 'integer',
        'url' => 'string',
        'code' => 'string',
        'visits' => 'integer',
    ];
}

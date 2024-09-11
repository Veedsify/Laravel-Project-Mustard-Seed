<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
    use HasFactory;


    protected $fillable = [
        'url',
        'ip',
        'user_agent',
        'referrer',
        'device',
        'browser',
        'platform',
        'country',
        'city',
        'state',
        'timezone',
    ];
}

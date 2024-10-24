<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    /** @use HasFactory<\Database\Factories\ContactPageFactory> */
    use HasFactory;

    protected $fillable = [
        'phone',
        'email',
        'location',
        'address',
        'map_embed',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
    ];
}

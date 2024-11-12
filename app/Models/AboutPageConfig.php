<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPageConfig extends Model
{
    /** @use HasFactory<\Database\Factories\AboutPageConfigFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'short_title',
        'title',
        'main_image',
        'content',
        'donation_title',
        'donation_content',
        'volunteer_title',
        'volunteer_content',
        'read_more_title',
        'read_more_link'
    ];
}

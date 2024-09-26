<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageHeaderImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_page_header_image',
        'about_page_header_image',
        'campaigns_page_header_image',
        'donations_page_header_image',
        'blogs_page_header_image',
        'volunteers_page_header_image',
        'faq_page_header_image',
        'privacy_page_header_image',
        'terms_page_header_image',
        'contact_page_header_image',
    ];
}

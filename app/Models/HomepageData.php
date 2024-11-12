<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HomepageData extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'footer_text',
        'home_banner_intro',
        'home_banner_title',
        'home_banner_description',
        'home_banner_image',
        'show_banner_experience',
        'banner_experience_title_1',
        'banner_experience_desc_1',
        'banner_experience_title_2',
        'banner_experience_desc_2',
        'banner_experience_title_3',
        'banner_experience_desc_3',
        'show_feature_section',
        'show_event_section',
        'show_upcoming_event_section',
        'show_blog_section',
        'show_testimonial_section',
        'show_faq_section',
        'show_gallery_section',
    ];

    protected static function booted()
    {
        static::saving(function ($model) {
            if ($model->isDirty('home_banner_image')) {
                // Delete the old image
                if ($model->getOriginal('home_banner_image')) {
                    Storage::delete($model->getOriginal('home_banner_image'));
                }
            }
        });
        static::deleting(function ($model) {
            // Delete the image file
            if ($model->home_banner_image) {
                Storage::delete($model->home_banner_image);
            }
        });
    }
}

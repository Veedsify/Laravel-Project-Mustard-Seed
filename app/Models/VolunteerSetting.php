<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_available',
        'organization',
        'age',
        'bio',
        'image',
        'phone',
        'email',
        'website',
        'address',
        'city',
        'state',
        'country',
        'zip',
        'facebook',
        'twitter',
        'linkedin',
        'verification_number',
        'verification_state',
        'verification_city',
        'verification_zip',
        'verification_lga',
    ];


    // protected static function booted()
    // {
    //     static::created(function ($volunteerSetting) {

    //     });
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function educations()
    // {
    // }

    // public function skills()
    // {
    // }
}

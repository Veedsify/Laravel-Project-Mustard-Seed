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
        'profession',
        'age',
        'bio',
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
    ];


    protected static function booted()
    {
        static::created(function ($volunteerSetting) {
            // Create a new settings record for the newly created user
            VolunteerSettingEducation::create([
                'volunteer_setting_id' => $volunteerSetting->id,
            ]);
            VolunteerSettingSkill::create([
                'volunteer_setting_id' => $volunteerSetting->id,
            ]);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function educations()
    {
        return $this->hasMany(VolunteerSettingEducation::class);
    }

    public function skills()
    {
        return $this->hasMany(VolunteerSettingSkill::class);
    }
}

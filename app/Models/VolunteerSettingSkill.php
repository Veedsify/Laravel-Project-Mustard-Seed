<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerSettingSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'volunteer_setting_id',
        'summary',
        'name',
        'level',
        'max_level',
        'experience',
        'years',
        'proficiency',
        'interest',
    ];

    public function volunteer_setting()
    {
        return $this->belongsTo(VolunteerSetting::class);
    }
}

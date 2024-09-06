<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerSettingEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'volunteer_setting_id',
        'summary',
        'school',
        'degree',
        'field_of_study',
        'grade',
        'start_date',
        'end_date',
        'description',
    ];


    public function volunteer_setting()
    {
        return $this->belongsTo(VolunteerSetting::class);
    }
}

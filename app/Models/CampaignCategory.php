<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'status',
        'user_id',
    ];

    protected static function booted()
    {
        static::creating(function ($campaignCategory) {
            if (auth()->check()) {
                $campaignCategory->user_id = auth()->id();
            }
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
            if (Auth::check()) {
                $campaignCategory->user_id = Auth::user()->id;
            }
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

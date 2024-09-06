<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'status',
        'raised',
        'goal',
        'payment_method',
        'start_date',
        'amount',
        'payment_currency',
        'end_date',
        'featured',
        'campaign_category_id',
        'location_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function campaign_category()
    {
        return $this->belongsTo(CampaignCategory::class);
    }

    protected static function booted()
    {
        static::creating(function ($campaign) {
            if (Auth::check()) {
                $campaign->user_id = Auth::id();
            }
        });
    }
}

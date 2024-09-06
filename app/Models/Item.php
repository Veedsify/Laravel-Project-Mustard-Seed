<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'content',
        'quantity',
        'unit',
        'image',
        'condition',
        'status',
        'is_anonymous',
        'user_id',
        'category_id',
        'volunteer_id',
    ];

    public function category()
    {
        return $this->belongsTo(ItemCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function volunteer()
    {
        return $this->belongsTo(User::class, 'volunteer_id');
    }

    protected static function booted()
    {
        static::creating(function ($item) {
            $item->user_id = Auth::user()->id;
        });
    }
}

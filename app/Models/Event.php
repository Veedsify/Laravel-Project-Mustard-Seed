<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'image',
        'content',
        'user_id',
    ];

    public static function booted(){
        static::creating(function($event){
            $event->user_id = auth()->id();
        });
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}

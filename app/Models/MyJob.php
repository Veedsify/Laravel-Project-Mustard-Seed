<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MyJob extends Model
{
    /** @use HasFactory<\Database\Factories\MyJobFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'type',
        'location',
        'salary',
        'duration',
        'experience',
        'image1',
        'image2',
        'user_id',
    ];

    protected static function booted(){
        static::creating(function ($myJob){
            $myJob->user_id = Auth::user()->id;
            $myJob->slug = Str::slug($myJob->name . '-' . Str::random(5));
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function jobApplication (){
        return $this->hasMany(MyJobApplication::class);
    }

}

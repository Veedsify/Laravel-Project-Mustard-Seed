<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdVerified extends Model
{
    /** @use HasFactory<\Database\Factories\IdVerifiedFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'residential_address',
        'phone',
        'id_type',
        'id_number',
        'id_path',
        'face_path',
        'verification_status'
    ];


    public function user (){
        return $this->belongsTo(User::class);
    }
    
}

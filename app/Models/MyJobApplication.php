<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyJobApplication extends Model
{
    /** @use HasFactory<\Database\Factories\MyJobApplicationFactory> */
    use HasFactory;

    protected $fillable = [
        'my_job_id',
        'user_id',
        'name',
        'email',
        'phone',
        'cover_letter',
    ];

    public function job (){
        return $this->belongsTo(MyJob::class);
    }

}

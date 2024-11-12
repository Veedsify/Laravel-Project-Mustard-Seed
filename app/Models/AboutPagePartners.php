<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPagePartners extends Model
{
    /** @use HasFactory<\Database\Factories\AboutPagePartnersFactory> */
    use HasFactory;


    protected $fillable = [
        'id',
        'name',
        'image',
        'link'
    ];
    
}

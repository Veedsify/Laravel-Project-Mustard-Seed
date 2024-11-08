<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'first_name',
        'last_name',
        'reason',
        'unit',
        'is_approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}

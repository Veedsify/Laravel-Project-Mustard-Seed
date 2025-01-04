<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ApplicantFromOrganization extends Model
{
    protected $table = 'applicant_from_organization';

    protected $fillable = [
        'item_id',
        'name',
        'email',
        'phone',
        'image',
        'position',
        'status',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}

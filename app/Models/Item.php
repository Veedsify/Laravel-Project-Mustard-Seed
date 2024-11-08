<?php

namespace App\Models;

use App\Mail\DonationApproved;
use App\Mail\NewDonationReceived;
use App\Mail\SendUserWelcomeEmail;
use App\Mail\SendVolunteerWelcomeEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Resend\Laravel\Facades\Resend;

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
        return $this->belongsTo(ItemCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function volunteer()
    {
        return $this->belongsTo(User::class, 'volunteer_id');
    }

    public function appliedItems(): HasMany
    {
        return $this->hasMany(AppliedItem::class);
    }

    protected static function booted(): void
    {
        static::creating(function ($item) {
            $item->user_id = Auth::user()->id;
            $user = User::find($item->user_id);
            $volunteer = User::where([
                'role' => 'volunteer',
                'admin_approved' => true,
                'id' => $item->volunteer_id,
            ])->first();

            if ($volunteer) {
                $data = [
                    'message' => 'You have been assigned to a new donation item',
                    'user' => $user,
                ];
                Resend::emails()->send([
                    'from' => 'Mustard Seed Charity <info@mustardseedcharity.com>',
                    'to' => $volunteer->email,
                    'subject' => 'New Donation Item Received',
                    'html' => (new NewDonationReceived($item, $volunteer, $data))->render(),
                ]);
            }

            if ($user) {
                $data = [
                    'message' => ('You have successfully added a new donation on ' . config('app.name')),
                    'user' => $user,
                ];
                Resend::emails()->send([
                    'from' => 'Mustard Seed Charity <info@mustardseedcharity.com>',
                    'to' => $user->email,
                    'subject' => 'New Donation Item Received',
                    'html' => (new NewDonationReceived($item, $user, $data))->render(),
                ]);
            }
        });

        static::updating(function ($item) {
            if ($item->isDirty('status')) {
                if ($item->status) {
                    $user = User::find($item->user_id);
                    $data = [
                        'message' => ('Hi ' . $user->name . ', your donation has been approved'),
                    ];
                    Resend::emails()->send([
                        'from' => 'Mustard Seed Charity <info@mustardseedcharity.com>',
                        'to' => $user->email,
                        'subject' => 'Thanks For Your Donation',
                        'html' => (new DonationApproved($user, $item, $data))->render(),
                    ]);
                }
            }
        });
    }
}

<?php

namespace App\Models;

use App\Mail\JobAdded;
use App\Mail\JobApproved;
use App\Mail\SendUserWelcomeEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Resend\Laravel\Facades\Resend;

class   MyJob extends Model
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
        'volunteer_id'
    ];

    protected static function booted(): void
    {
        static::creating(function ($myJob) {
            $myJob->user_id = Auth::user()->id;
            $volunteer = User::where('role', 'volunteer')->inRandomOrder()->first();
            $myJob->volunteer_id = $volunteer->id;
            $myJob->slug = Str::slug($myJob->name . '-' . Str::random(5));
        });

        static::created(function ($myJob) {
            $user = User::find(Auth::id());
            $volunteer = User::find($myJob->volunteer_id);
            Resend::emails()->send([
                'from' => 'Mustard Seed Charity <info@mustardseedcharity.com>',
                'to' => $user->email,
                'subject' => 'You have added a new Job',
                'html' => (new JobAdded($user, $myJob))->render(),
            ]);
            Resend::emails()->send([
                'from' => 'Mustard Seed Charity <info@mustardseedcharity.com>',
                'to' => $volunteer->email,
                'subject' => 'You have been assigned a new Job',
                'html' => (new JobAdded($volunteer, $myJob))->render(),
            ]);
        });
        static::updating(function ($myJob) {
            if ($myJob->isDirty('name')) {
                $myJob->slug = Str::slug($myJob->name . '-' . Str::random(5));
            }
            if ($myJob->isDirty('status') && $myJob->status == 1) {
                $user = User::find($myJob->user_id);
                $volunteer = User::find($myJob->volunteer_id);
                Resend::emails()->send([
                    'from' => 'Mustard Seed Charity <info@mustardseedcharity.com>',
                    'to' => $user->email,
                    'subject' => 'Your Job has been approved',
                    'html' => (new JobApproved($user, $myJob))->render(),
                ]);
            }
        });
    }

    public function volunteer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'volunteer_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobApplication(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MyJobApplication::class);
    }

}

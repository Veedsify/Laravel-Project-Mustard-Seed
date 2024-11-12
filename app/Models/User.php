<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Mail\DisableUserAccount;
use App\Mail\SendUserWelcomeEmail;
use App\Mail\SendVolunteerWelcomeEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Resend\Laravel\Facades\Resend;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;



    public function canAccessPanel(Panel $panel): bool
    {
        return true;
        //         if($panel->getId() === $this->role) {
        //             return true;
        //         }
        // //        dump($panel);
        //         return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'avatar',
        'cover',
        'role',
        'bio',
        'google_id',
        'location',
        'admin_approved',
        'admin_id',
        'donator_id',
        'volunteer_id',
        'password_reset_token',
        'email_verified_at',
    ];


    public function myJob()
    {
        return $this->hasMany(MyJob::class);
    }

    public function idVerified()
    {
        return $this->hasOne(IdVerified::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }

    // Add this method to create settings after a user is created
    protected static function booted()
    {
        static::creating(function ($user){
            $user->password = bcrypt('password');
        });

        static::created(function ($user) {
            // Create a new settings record for the newly created volunteer users
            if (Auth::check() && Auth::user()->hasRole('admin')) {
                if ($user->role === 'volunteer') {
                    VolunteerSetting::create([
                        'user_id' => $user->id,
                    ]);
                }
            }
        });

        static::updating(function ($user) {
            if ($user->isDirty('admin_approved')) {
                if ($user->admin_approved) {
                    if ($user->role === 'volunteer') {
                        $user->email_verified_at = now();
                        $data = [
                            'volunteerSettings' => VolunteerSetting::where('user_id', $user->id)->first(),
                        ];
                        // Send Welcome Email(implement the email sending logic)
                        Resend::emails()->send([
                            'from' => 'Mustard Seed Charity <info@mustardseedcharity.com>',
                            'to' => $user->email,
                            'subject' => 'Hey Volunteer: Your Account has been Approved',
                            'html' => (new SendVolunteerWelcomeEmail($user, $data))->render(),
                        ]);
                    }
                } else {
                    // Send Disable User Account Email(implement the email sending logic)
                    Resend::emails()->send([
                        'from' => 'Mustard Seed Charity <info@mustardseedcharity.com>',
                        'to' => $user->email,
                        'subject' => 'Hey User: Your Account has been Disabled',
                        'html' => (new DisableUserAccount($user))->render(),
                    ]);
                    Log::info('User account disabled');
                }
            }
        });
    }

    public function events ()
    {
        return $this->hasMany(Event::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }


    public function volunteer_settings()
    {
        return $this->hasOne(VolunteerSetting::class);
    }

    // Volunteer belongs to an Admin
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id')->where('role', 'admin');
    }

    // User belongs to a Volunteer
    public function volunteer()
    {
        return $this->belongsTo(User::class, 'volunteer_id')->where('role', 'volunteer');
    }

    // Donators are standalone
    public function donators()
    {
        return $this->hasMany(User::class, 'donator_id')->where('role', 'donator');
    }

    // Admin has many Volunteers
    public function volunteers()
    {
        return $this->hasMany(User::class, 'admin_id')->where('role', 'volunteer');
    }

    // Volunteer has many Users
    public function users()
    {
        return $this->hasMany(User::class, 'volunteer_id')->where('role', 'user');
    }


    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function campaignCategories()
    {
        return $this->hasMany(CampaignCategory::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function appliedItems()
    {
        return $this->hasMany(AppliedItem::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

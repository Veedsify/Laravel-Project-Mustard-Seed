<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

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
        static::created(function ($user) {
            // Create a new settings record for the newly created user
            if ($user->role === 'volunteer') {
                VolunteerSetting::create([
                    'user_id' => $user->id,
                ]);
            }
        });
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

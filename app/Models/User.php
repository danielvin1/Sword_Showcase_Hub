<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Support\MediaUrl;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'profile_photo',
        'banner_photo',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'profile_photo_url',
        'banner_photo_url',
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

    public function getProfilePhotoUrlAttribute(): string
    {
        return MediaUrl::resolve($this->profile_photo, '', [
            'uploads',
            'profile-photos',
            'images',
        ]);
    }

    public function getBannerPhotoUrlAttribute(): string
    {
        return MediaUrl::resolve($this->banner_photo, '', [
            'uploads',
            'profile-banners',
            'images',
        ]);
    }

    public function swords()
    {
        return $this->hasMany(Sword::class);
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, 'user_follows', 'followed_id', 'follower_id')
            ->withTimestamps();
    }

    public function following()
    {
        return $this->belongsToMany(self::class, 'user_follows', 'follower_id', 'followed_id')
            ->withTimestamps();
    }

    public function isFollowing(?self $user): bool
    {
        if (! $user || ! $this->exists || ! $user->exists) {
            return false;
        }

        return $this->following()->where('followed_id', $user->id)->exists();
    }
}

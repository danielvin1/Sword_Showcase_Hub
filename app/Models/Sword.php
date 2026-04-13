<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\MediaUrl;

class Sword extends Model
{
    protected $fillable = ['name', 'type', 'description', 'image', 'user_id'];

    protected $appends = ['image_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute(): string
    {
        return MediaUrl::resolve($this->image, '/images/katana.jpg', [
            'swords',
            'uploads',
            'images',
        ]);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }
}

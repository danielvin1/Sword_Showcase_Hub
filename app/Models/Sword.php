<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sword extends Model
{
    protected $fillable = ['name', 'type', 'description', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
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

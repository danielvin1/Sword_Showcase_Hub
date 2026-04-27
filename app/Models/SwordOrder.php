<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SwordOrder extends Model
{
    protected $fillable = [
        'user_id',
        'sword_name',
        'sword_type',
        'budget',
        'timeline',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
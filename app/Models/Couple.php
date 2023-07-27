<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Couple extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user1(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user1_id');
    }

    public function user2(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user2_id');
    }
}


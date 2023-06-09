<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CommunityUser extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'points'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'community_id',
        'user_id',
        'post_text',
        'likes'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function community()
    {
        return $this->belongsTo('App\Models\Community');
    }
}

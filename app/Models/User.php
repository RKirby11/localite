<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\CommunityUser;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'city',
        'age',
        'avatar',
        'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function community(){
        return $this->belongsToMany(Community::class, 'community_user')
            ->withPivot(['points'])
            ->orderBy('pivot_points', 'desc');
    }
    
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function skills()
    {
        return $this->hasMany('App\Models\Skill');
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'user_friend', 'user_id', 'friend_id');
    }
}

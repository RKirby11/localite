<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public $timestamps = false;

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}

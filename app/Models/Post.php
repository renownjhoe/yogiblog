<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeForUser($query)
    {
        if (Auth::check()) {
            return $query->where('user_id', Auth::id());
        }

        return $query;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

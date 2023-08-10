<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    public static function boot(){
        parent::boot();
        static::saving(function($post){
            $post->slug=Str::slug($post->name);
        });
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function findFavourite($post)
    {
        if (Auth::user()) {
            if (Favourite::where('post_id', $post->id)->where('user_id', Auth::id())->first()) {
                return true;
            }
            return false;
        }
        return false;
    }
}

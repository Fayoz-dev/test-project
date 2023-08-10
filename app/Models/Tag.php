<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    public static function boot(){
        parent::boot();
        static::saving(function($tag){
            $tag->slug=Str::slug($tag->name);
        });
    }

    public function posts():BelongsToMany
    
    {
         return $this->belongsToMany(Post::class, 'post_tags');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'designation',
        'company',
        'linkedin_url',
        'twitter_url',
        'is_active',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

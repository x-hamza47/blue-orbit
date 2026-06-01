<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'service_id',
        'author_id',
        'title',
        'slug',
        'excerpt',
        'thumbnail',
        'published_at',
        'read_time',
        'content_json',
        'meta_title',
        'meta_description',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
        'content_json' => 'array',
    ];

    // Relations
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Query Scopes
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeDraft($query)
    {
        return $query->where('is_published', false);
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->thumbnail ? asset('storage/'.$this->thumbnail) : null;
    }


    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $fillable = [
        'parent_id',
        'icon',
        'title',
        'slug',
        'color',
        'desc',
        'show_on_home',
        'home_order',
        'is_active',
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
        'show_on_home' => 'boolean',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function sections()
    {
        return $this->hasMany(ServiceSection::class)->orderBy('order');
    }

    public function children()
    {
        return $this->hasMany(Service::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Service::class, 'parent_id');
    }

    public function getTypeAttribute()
    {
        return $this->parent_id ? 'sub' : 'parent';
    }

    // Info: Query Scopes

    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }   

    public function scopeSubservices($query)
    {
        return $query->whereNotNull('parent_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }   

    public function scopeShowOnHome($query)
    {
        return $query->where('show_on_home', true);
    }
}

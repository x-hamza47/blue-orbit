<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    protected $fillable = [
        'service_id',
        'type',
        'data',
        'order',
    ];
    protected $casts = [
        'data' => 'array',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

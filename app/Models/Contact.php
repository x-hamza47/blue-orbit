<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'service_id', 'message'];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

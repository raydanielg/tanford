<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'tagline',
        'default_email',
        'default_phone',
        'default_language',
        'timezone',
        'maintenance_mode',
        'logo_url',
    ];

    protected $casts = [
        'maintenance_mode' => 'boolean',
    ];
}

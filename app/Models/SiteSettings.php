<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    use HasFactory;
    protected $table = 'site_settings';

    protected $fillable = [
        'title',
        'favicon_path',
        'logo_img_path',
        'description',
        'meta_tags',
        'social_medias',
    ];

    protected $casts = [
        'meta_tags' => 'json',
        'social_medias' => 'json',
    ];
}
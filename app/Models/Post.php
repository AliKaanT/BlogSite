<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $hidden = ['pivot'];
    protected $fillable = [
        'title',
        'content',
        'images',
        'slug',
        'preview_content',
        'posted_at',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'post_category_link');
    }

    protected $casts = [
        'images' => 'json',
    ];
}
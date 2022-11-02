<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $hidden = ['pivot'];

    protected $fillable = [
        'name',
        'is_active'
    ];
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category_link');
    }
}
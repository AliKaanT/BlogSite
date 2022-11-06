<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategoryLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'category_id',
    ];
    protected $table = 'post_category_link';
}

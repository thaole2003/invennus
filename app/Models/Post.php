<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostCategoryPost;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'user_id'
    ];

    public function category()
    {
        return $this->hasMany(PostCategoryPost::class);
    }

    public function category_posts()
    {
        return $this->belongsToMany(PostCategories::class, 'post_category_posts', 'post_id', 'categorypost_id');
    }
}

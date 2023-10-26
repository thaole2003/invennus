<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category_posts', 'categorypost_id', 'post_id');
    }
}

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
        'image',
        'description',
        'user_id'
    ];

    public function category()
    {
        return $this->hasMany(PostCategoryPost::class);
    }
}
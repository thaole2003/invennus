<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategoryPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'categorypost_id',
    ];
    public function categorypost()
    {
        return $this->belongsTo(PostCategories::class, 'categorypost_id', 'id');
    }

   
}

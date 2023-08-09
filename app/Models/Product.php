<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'title',
        'metatitle',
        'slug',
        'description',
        'image',
        'length',
        'width',
        'weight',
    ];
}

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
        'price',
        'length',
        'width',
        'weight',
    ];
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products', 'product_id', 'category_id');
    }
}

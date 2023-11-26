<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'size_id',
        'color_id',
        'price',
        'total_quantity_stock'
    ];
    public function getTotalQuantityStock()
    {
        return $this->sum('total_quantity_stock');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function storeVariant()
    {
        return $this->hasOne(StoreVariant::class, 'variant_id');
    }
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
    public function sizes()
    {
        return $this->hasOne(Size::class, 'size_id', 'id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
}

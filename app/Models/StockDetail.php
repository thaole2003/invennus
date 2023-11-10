<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'stock_id',
        'product_variant_id',
        'price',
        'quantity'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_radiant',
        'quantity'
    ];

    public function ProductVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_radiant', 'id');
    }
}

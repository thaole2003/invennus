<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVariant;

class BillDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_variant_id',
        'quantity',
        'bill_id',
    ];

    public function ProductVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id', 'id');
    }
}

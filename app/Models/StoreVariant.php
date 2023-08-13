<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;
use App\Models\ProductVariant;

class StoreVariant extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'variant_id',
        'quantity',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}

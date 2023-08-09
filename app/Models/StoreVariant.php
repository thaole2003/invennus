<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreVariant extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'variant_id',
        'quantity',
    ];
}

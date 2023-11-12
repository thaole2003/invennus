<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'vender_id',
        'type',
        'total_price',
    ];

    public function vender()
    {
        return $this->belongsTo(Vendor::class, 'vender_id', 'id');
    }
}

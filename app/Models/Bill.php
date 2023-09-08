<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BillDetails;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'total_price',
        'note',
        'status',
        'pay_method',
        'user_id',
    ];
    public function billDetail()
    {
        return $this->hasMany(BillDetails::class, 'bill_id', 'id');
    }
}

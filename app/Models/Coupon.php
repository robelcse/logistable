<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $primaryKey = 'coupon_id';
    protected $fillable = [
        'original_coupon_id',
        'user_id',
        'code',
        'amount',
        'discount_type',
        'description',
        'product_ids',
        'date_expires',
        'date_created',
        'coupon_obj' 
    ];

    public function shop()
    {
        return $this->hasOne(Shop::class,'shop_id','shop_id');
    }
}

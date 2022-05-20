<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'original_order_id',
        'original_product_ids',
        'user_id',
        'shop_id',
        'customer_name',
        'product_name',
        'status',
        'total',
        'order_created_at',
        'order_modified_at',
        'order_obj'
    ];
    
    public function shop()
    {
        return $this->hasOne(Shop::class,'shop_id','shop_id');
    }
}

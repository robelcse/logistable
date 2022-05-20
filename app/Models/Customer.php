<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'original_customer_id',
        'name',
        'email',
        'user_id',
        'shop_id',
        'phone',
        'city',
        'country',
        'order_created_at',
        'order_modified_at',
        'order_obj'
    ];

    public function shop()
    {
        return $this->hasOne(Shop::class,'shop_id','shop_id');
    }
}

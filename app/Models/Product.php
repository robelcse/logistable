<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'original_id',
        'user_id',
        'shop_id',
        'name',
        'permalink',
        'type',
        'status',
        'sku',
        'quantity',
        'price',
        'product_obj'
    ];

    public function shop()
    {
        return $this->hasOne(Shop::class,'shop_id','shop_id');
    }


    public static function productById($product_id){

      return Product::where('original_id', $product_id)->first();
    }
}
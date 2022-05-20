<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $primaryKey = 'shop_id';
    protected $fillable = [
        'shop_url',
        'consumer_key',
        'consumer_secret',
        'shop_type',
        'validate_ssl',
        'shop_name'
    ];
}
<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'products/*/new',
        'products/*/update-by-hook',
        'products/*/delete-by-hook',

        'orders/*/new',
        'orders/*/update-by-hook',
        'orders/*/delete-by-hook',

        'coupons/*/new',
        'coupons/*/update-by-hook',
        'coupons/*/delete-by-hook',

        'customers/*/new',
        'customers/*/update-by-hook',
        'customers/*/delete-by-hook',
        
    ];
}

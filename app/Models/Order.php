<?php

namespace App\Models;

use App\Http\Controllers\OrderController;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'order_line_number',
        'product_name',
        'product_height',
        'product_weight',
        'customer_name',
        'customer_address',
        'customer_city',
        'customer_postal_code',
        'customer_phone',
    ];
}

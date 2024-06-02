<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'order_line_number',
        'product_name',
        'product_height_cm', // Updated column name
        'product_weight_g',  // Updated column name
        'customer_name',
        'customer_address',
        'customer_city',
        'customer_postal_code',
        'customer_phone',
    ];
}

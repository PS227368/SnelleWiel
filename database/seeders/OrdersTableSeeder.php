<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Verwijder eventuele bestaande data om duplicaten te voorkomen
        Order::truncate();

        // Maak testorders aan
        $orders = [
            [
                'order_number' => '12345',
                'order_line_number' => '1',
                'product_name' => 'Product A',
                'product_height' => '10',
                'product_weight' => '5',
                'customer_name' => 'John Doe',
                'customer_address' => '123 Main St',
                'customer_city' => 'Anytown',
                'customer_postal_code' => '12345',
                'customer_phone' => '555-1234',
            ],
            // Voeg meer testorders toe indien nodig
        ];

        // Loop door de testorders en voeg ze toe aan de database
        foreach ($orders as $orderData) {
            Order::create($orderData);
        }
    }
}

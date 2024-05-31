<?php
namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        // Haal alle orders op uit de database
        $orders = Order::all();

        // Geef de orders door aan de view om ze weer te geven
        return view('orders', ['orders' => $orders]);
    }
}

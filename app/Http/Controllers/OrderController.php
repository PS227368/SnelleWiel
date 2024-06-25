<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        // Haal alle orders op uit de database
        $orders = Order::all();

        // Geef de orders door aan de view om ze weer te geven
        return view('orders', ['orders' => $orders]);
    }

    public function updateStatus(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully');
    }
    public function export()
{
    try {
        $orders = Order::all();
        $csvData = "Order Number,Order Line Number,Product Name,Product Height In CM,Product Weight In G,Customer Name,Customer Address,Customer City,Customer Postal Code,Customer Phone,Status\n";

        foreach ($orders as $order) {
            $csvData .= "{$order->order_number},{$order->order_line_number},{$order->product_name},{$order->product_height_cm},{$order->product_weight_g},{$order->customer_name},{$order->customer_address},{$order->customer_city},{$order->customer_postal_code},{$order->customer_phone},{$order->status}\n";
        }

        $fileName = 'orders_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        Session::flash('export_success', 'CSV download is successful.');

        return Response::make(rtrim($csvData, "\n"), 200, $headers);
    } catch (\Exception $e) {
        Session::flash('export_error', 'CSV download failed: ' . $e->getMessage());
        return redirect()->back();
    }
}

}

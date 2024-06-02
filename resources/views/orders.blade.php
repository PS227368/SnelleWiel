@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Orders</h1>
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 border-b-2 border-gray-300">
                <th class="py-2 px-4 text-left border-r">Order Number</th>
                <th class="py-2 px-4 text-left border-r">Order Line Number</th>
                <th class="py-2 px-4 text-left border-r">Product Name</th>
                <th class="py-2 px-4 text-left border-r">Product Height</th>
                <th class="py-2 px-4 text-left border-r">Product Weight</th>
                <th class="py-2 px-4 text-left border-r">Customer Name</th>
                <th class="py-2 px-4 text-left border-r">Customer Address</th>
                <th class="py-2 px-4 text-left border-r">Customer City</th>
                <th class="py-2 px-4 text-left border-r">Customer Postal Code</th>
                <th class="py-2 px-4">Customer Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-2 px-4 border-r">{{ $order->order_number }}</td>
                    <td class="py-2 px-4 border-r">{{ $order->order_line_number }}</td>
                    <td class="py-2 px-4 border-r">{{ $order->product_name }}</td>
                    <td class="py-2 px-4 border-r">{{ $order->product_height_cm }}</td>
                    <td class="py-2 px-4 border-r">{{ $order->product_weight_g }}</td>
                    <td class="py-2 px-4 border-r">{{ $order->customer_name }}</td>
                    <td class="py-2 px-4 border-r">{{ $order->customer_address }}</td>
                    <td class="py-2 px-4 border-r">{{ $order->customer_city }}</td>
                    <td class="py-2 px-4 border-r">{{ $order->customer_postal_code }}</td>
                    <td class="py-2 px-4">{{ $order->customer_phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

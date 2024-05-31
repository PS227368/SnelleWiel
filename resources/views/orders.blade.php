@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Orders</h1>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Order Number</th>
                <th class="py-2">Order Line Number</th>
                <th class="py-2">Product Name</th>
                <th class="py-2">Product Height</th>
                <th class="py-2">Product Weight</th>
                <th class="py-2">Customer Name</th>
                <th class="py-2">Customer Address</th>
                <th class="py-2">Customer City</th>
                <th class="py-2">Customer Postal Code</th>
                <th class="py-2">Customer Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td class="py-2">{{ $order->order_number }}</td>
                    <td class="py-2">{{ $order->order_line_number }}</td>
                    <td class="py-2">{{ $order->product_name }}</td>
                    <td class="py-2">{{ $order->product_height }}</td>
                    <td class="py-2">{{ $order->product_weight }}</td>
                    <td class="py-2">{{ $order->customer_name }}</td>
                    <td class="py-2">{{ $order->customer_address }}</td>
                    <td class="py-2">{{ $order->customer_city }}</td>
                    <td class="py-2">{{ $order->customer_postal_code }}</td>
                    <td class="py-2">{{ $order->customer_phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


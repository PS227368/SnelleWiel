@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Orders</h1>
    @if(session('success'))
        <div class="bg-green-200 text-green-800 rounded px-3 py-2 mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('export_success'))
        <div class="bg-green-200 text-green-800 rounded px-3 py-2 mb-4">
            {{ session('export_success') }}
        </div>
    @endif

    @if(session('export_error'))
        <div class="bg-red-200 text-red-800 rounded px-3 py-2 mb-4">
            {{ session('export_error') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('orders.export') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Download CSV</a>
    </div>

    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 border-b-2 border-gray-300">
                <th class="py-2 px-4 text-left border-r">Order Number</th>
                <th class="py-2 px-4 text-left border-r">Order Line Number</th>
                <th class="py-2 px-4 text-left border-r">Product Name</th>
                <th class="py-2 px-4 text-left border-r">Product Height In CM</th>
                <th class="py-2 px-4 text-left border-r">Product Weight In G</th>
                <th class="py-2 px-4 text-left border-r">Customer Name</th>
                <th class="py-2 px-4 text-left border-r">Customer Address</th>
                <th class="py-2 px-4 text-left border-r">Customer City</th>
                <th class="py-2 px-4 text-left border-r">Customer Postal Code</th>
                <th class="py-2 px-4 text-left border-r">Customer Phone</th>
                <th class="py-2 px-4 text-left border-r">Status</th>
                <th class="py-2 px-4"></th>
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
                    <td class="py-2 px-4 border-r">{{ $order->customer_phone }}</td>
                    <td class="py-2 px-4 border-r">
                        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            <select name="status" id="status_{{ $order->id }}" class="status-select">
                                <option value="open" {{ $order->status == 'open' ? 'selected' : '' }}>Open</option>
                                <option value="afgeleverd" {{ $order->status == 'afgeleverd' ? 'selected' : '' }}>Afgeleverd</option>
                                <option value="retour" {{ $order->status == 'retour' ? 'selected' : '' }}>Retour</option>
                            </select>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                        </form>
                    </td>
                    <td class="py-2 px-4"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

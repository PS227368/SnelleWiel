<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snelle Vingers</title>
    @vite('resources/css/app.css')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Navigation Bar -->
    <nav class="bg-blue-500 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-white text-2xl font-bold">Snelle Vingers</a>
            <div>
                @if(!request()->is('orders'))
                    <a href="{{ url('/orders') }}" class="text-white text-lg mx-2">Orders</a>
                @endif
                @if(!request()->is('upload'))
                    <a href="{{ url('/upload') }}" class="text-white text-lg mx-2">Upload</a>
                @endif
            </div>
        </div>
    </nav>
    
    <!-- Content from other views will be injected here -->
    <div class="container mx-auto mt-8">
        @yield('content')
    </div>
</body>
</html>

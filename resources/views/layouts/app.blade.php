<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4 w-50% p-3 mx-auto border-2 rounded border-dotted border-indigo-500">
        <header class="flex">
            @auth
            <nav class="grow">
                <a href="{{ route('products') }}" class="underline">Products</a> |
                <a href="{{ route('inventory') }}" class="underline">Inventory</a>
            </nav>

            <div class="user">
                Hello, {{ auth()->user()->name }} -
                <a href="{{ route('logout') }}" class="underline">Logout</a>
            </div>
            @endauth
        </header>
        @yield('content')
    </div>
    <script src="/js/app.js"></script>
</body>
</html>

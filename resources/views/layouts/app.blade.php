<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('products.index') }}">Products</a>
            <a href="{{ route('cart.view') }}">Cart</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
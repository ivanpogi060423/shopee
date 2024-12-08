@extends('layouts.app')

@section('content')
    <h1>Your Cart</h1>

    @if (empty($cart))
        <p>Your cart is empty.</p>
    @endif

    @if (!empty($cart))
        <ul>
            @foreach ($cart as $id => $item)
                <li>
                    {{ $item['name'] }} - Quantity: 
                    <form action="{{ route('cart.update', $id) }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                        <button type="submit">Update</button>
                    </form>
                    <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit">Remove</button>
                    </form>
                    <p>Total: ${{ $item['price'] * $item['quantity'] }}</p>
                </li>
            @endforeach
        </ul>
        <h2>Grand Total: ${{ $total }}</h2>
        <a href="{{ route('checkout') }}">Proceed to Checkout</a>
    @endif

    <br>
    <a href="{{ route('products.index') }}">Go back to the product list</a>
@endsection
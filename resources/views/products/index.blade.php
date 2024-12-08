@extends('layouts.app')

@section('content')
    <h1>Product List</h1>
    <form method="GET" action="{{ route('products.index') }}">
        <input type="text" name="search" placeholder="Search products">
        <button type="submit">Search</button>
    </form>

    <ul>
        @foreach ($products as $product)
            <li>
                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                <p>{{ $product->description }}</p>
                <p>${{ $product->price }}</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit">Add to Cart</button>
                </form>
            </li>
        @endforeach
    </ul>

    {{ $products->links() }}
@endsection
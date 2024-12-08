@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>${{ $product->price }}</p>
    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <button type="submit">Add to Cart</button>
    </form>
    <a href="{{ route('products.index') }}">Back to Product List</a>
@endsection
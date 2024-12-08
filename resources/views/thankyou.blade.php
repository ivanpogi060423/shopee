@extends('layouts.app')

@section('content')
    <h1>Thank You for Shopping with Us!</h1>
    <p>Your order will be processed shortly.</p>
    <a href="{{ route('products.index') }}">Continue Shopping</a>
@endsection
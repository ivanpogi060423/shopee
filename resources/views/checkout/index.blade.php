@extends('layouts.app')

@section('content')
    <h1>Checkout</h1>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <label for="shipping_address">Shipping Address:</label>
        <input type="text" name="shipping_address" required>
        <label for="payment_method">Payment Method:</label>
        <select name="payment_method" required>
            <option value="cash_on _delivery">Cash on Delivery</option>
            <!-- Add more payment options as needed -->
        </select>
        <button type="submit">Confirm Order</button>
    </form>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }

    public function process(Request $request)
    {
         // Validate and process the order
    $validatedData = $request->validate([
        'shipping_address' => 'required|string|max:255',
        'payment_method' => 'required|string',
    ]);
        // Validate and process the order
        // Clear the cart after successful checkout
        Session::forget('cart');

    // Here you would typically save the order to the database
    // For example:
    // Order::create($validatedData);

    // Redirect to the thank you page
    return redirect()->route('thankyou');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product; // Make sure to import the Product model

class CartController extends Controller
{
    public function add($id)
    {
        // Find the product by ID
        $product = Product::find($id);

        // Check if the product exists
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        // Get the current cart from the session
        $cart = Session::get('cart', []);

        // If the product is already in the cart, increment the quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // If not, add the product with its price and initial quantity of 1
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price, // Store the price
                'quantity' => 1, // Start with a quantity of 1
            ];
        }

        // Save the updated cart back to the session
        Session::put('cart', $cart);

        // Redirect to the cart view
        return redirect()->route('cart.view')->with('success', 'Product added to cart successfully.');
    }

    public function view()
    {
        $cart = Session::get('cart', []);
        $total = 0;

        // Calculate the total price of the items in the cart
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.view', compact('cart', 'total'));
    }

    public function update(Request $request, $id)
    {
        $cart = Session::get('cart', []);

        // Check if the item exists in the cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity; // Update the quantity
        }

        // Save the updated cart back to the session
        Session::put('cart', $cart);

        return redirect()->route('cart.view')->with('success', 'Cart updated successfully.');
    }

    public function remove($id)
    {
        $cart = Session::get('cart', []);

        // Check if the item exists in the cart
        if (isset($cart[$id])) {
            unset($cart[$id]); // Remove the item from the cart
        }

        // Save the updated cart back to the session
        Session::put('cart', $cart);

        return redirect()->route('cart.view')->with('success', 'Item removed from cart successfully.');
    }
}
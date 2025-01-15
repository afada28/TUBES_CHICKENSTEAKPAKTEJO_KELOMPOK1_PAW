<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('orders.create', compact('product'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1', // Validate quantity
        ]);

        // Create the order
        Order::create([
            'customer_name' => $request->customer_name,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity, // Capture quantity
        ]);

        // Redirect to the orders index with a success message
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function index()
{
    // Retrieve all orders with their associated products
    $orders = Order::with('product')->get();

    // Calculate totals
    $totalOrders = $orders->count();
    $totalQuantity = $orders->sum('quantity');
    $totalPrice = $orders->sum(function ($order) {
        return $order->quantity * $order->product->price; // Calculate total price
    });

    return view('orders.index', compact('orders', 'totalOrders', 'totalQuantity', 'totalPrice'));
}

    public function destroy($id)
    {
        // Find the order by ID and delete it
        $order = Order::findOrFail($id);
        $order->delete();

        // Redirect to the orders index with a success message
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibatalkan!');
    }
}

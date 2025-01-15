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
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
        ]);

        Order::create([
            'customer_name' => $request->customer_name,
            'product_id' => $request->product_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function index()
    {
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibatalkan!');
    }
}

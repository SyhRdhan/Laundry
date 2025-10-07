<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller {
    public function index() {
        // Asumsi customer_id dari session; ganti dengan auth
        $customerId = 1;  // Placeholder
        $orders = Order::with('service')->where('customer_id', $customerId)->latest()->get();
        return view('customer.orders', compact('orders'));
    }

    public function store(Request $request) {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer|min:1',
            'pickup_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $service = Service::find($request->service_id);
        $total = $request->quantity * $service->price;

        Order::create(array_merge($request->all(), ['customer_id' => 1, 'total_price' => $total]));  // Placeholder customer_id
        return redirect()->route('customer.orders.index')->with('success', 'Pesanan berhasil ditempatkan.');
    }
}
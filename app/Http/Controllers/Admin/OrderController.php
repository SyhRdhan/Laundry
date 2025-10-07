<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar semua pesanan.
     */
    public function index()
    {
        // Mengambil semua data pesanan dengan relasi ke customer dan service
        // diurutkan dari yang terbaru.
        $orders = Order::with(['customer', 'service'])->latest()->get();
        
        // Mengirim data orders ke view
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Menampilkan form untuk membuat pesanan baru.
     */
    public function create()
    {
        $customers = Customer::orderBy('name')->get();
        $services = Service::all();
        return view('admin.orders.create', compact('customers', 'services'));
    }

    /**
     * Menyimpan pesanan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer|min:1',
            'pickup_date' => 'required|date',
            'notes' => 'nullable|string|max:500',
        ]);

        $service = Service::findOrFail($request->service_id);
        $total_price = $request->quantity * $service->price;

        Order::create([
            'customer_id' => $request->customer_id,
            'service_id' => $request->service_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
            'pickup_date' => $request->pickup_date,
            'notes' => $request->notes,
            'status' => 'pending', // Status default
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil dibuat.');
    }

    // ... (method lainnya seperti edit, update, destroy tetap sama)

    public function edit(Order $order)
    {
        $customers = Customer::all(['id', 'name']);
        $services = Service::all(['id', 'name']);
        return view('admin.orders.edit', compact('order', 'customers', 'services'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer|min:1',
            'pickup_date' => 'required|date',
            'notes' => 'nullable|string|max:500',
        ]);

        $service = Service::findOrFail($request->service_id);
        $total_price = $request->quantity * $service->price;

        $order->update([
            'customer_id' => $request->customer_id,
            'service_id' => $request->service_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
            'pickup_date' => $request->pickup_date,
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil diubah.');
    }
    
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
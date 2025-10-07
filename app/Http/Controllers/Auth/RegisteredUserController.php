<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // <-- Pastikan ini ada
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Menampilkan form registrasi.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Menangani permintaan registrasi.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Customer::class],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // PERBAIKAN FINAL: Enkripsi password secara eksplisit di sini
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password), 
        ]);

        event(new Registered($customer));

        return redirect()->route('login')->with('status', 'Pendaftaran berhasil! Silakan login.');
    }
}
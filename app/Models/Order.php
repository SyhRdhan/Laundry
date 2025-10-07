<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 
        'service_id', 
        'quantity', 
        'total_price', 
        'status',
        'pickup_date', 
        'delivery_date', 
        'notes'
    ];

    protected $casts = [
        'pickup_date' => 'date',
        'delivery_date' => 'date',
    ];

    /**
     * Mendefinisikan relasi "belongsTo" ke model Customer.
     * Satu pesanan dimiliki oleh satu pelanggan.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Mendefinisikan relasi "belongsTo" ke model Service.
     * Satu pesanan memiliki satu layanan.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
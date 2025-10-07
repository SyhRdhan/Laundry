<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller {
    public function index() {
        $services = Service::all();
        return view('customer.services', compact('services'));
    }
}
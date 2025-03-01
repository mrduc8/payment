<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package; // Sử dụng đúng model

class PaymentController extends Controller
{
    public function index()
    {
        $packages = Package::all();
    
        return view('payment.index', compact('packages'));
    }
}

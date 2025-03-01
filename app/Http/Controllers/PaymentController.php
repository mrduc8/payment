<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package; // Sử dụng đúng model

class PaymentController extends Controller
{
    public function index()
    {
        $packages =  [
            ["name" => "Gói 20K", "amount" => 20000, "knb" => 2000, "bonus_percent" => 10, "bonus_knb" => 200, "total_knb" => 2200, "rate" => 0.11],
            ["name" => "Gói 50K", "amount" => 50000, "knb" => 5000, "bonus_percent" => 10, "bonus_knb" => 500, "total_knb" => 5500, "rate" => 0.11],
            ["name" => "Gói 100K", "amount" => 100000, "knb" => 10000, "bonus_percent" => 10, "bonus_knb" => 1000, "total_knb" => 11000, "rate" => 0.11],
            ["name" => "Gói 200K", "amount" => 200000, "knb" => 20000, "bonus_percent" => 20, "bonus_knb" => 4000, "total_knb" => 24000, "rate" => 0.12],
            ["name" => "Gói 300K", "amount" => 300000, "knb" => 30000, "bonus_percent" => 20, "bonus_knb" => 6000, "total_knb" => 36000, "rate" => 0.12],
            ["name" => "Gói 500K", "amount" => 500000, "knb" => 50000, "bonus_percent" => 20, "bonus_knb" => 10000, "total_knb" => 60000, "rate" => 0.12],
            ["name" => "Gói 1M", "amount" => 1000000, "knb" => 100000, "bonus_percent" => 20, "bonus_knb" => 20000, "total_knb" => 120000, "rate" => 0.12],
            ["name" => "Gói 2M", "amount" => 2000000, "knb" => 200000, "bonus_percent" => 25, "bonus_knb" => 50000, "total_knb" => 250000, "rate" => 0.13],
            ["name" => "Gói 5M", "amount" => 5000000, "knb" => 500000, "bonus_percent" => 25, "bonus_knb" => 125000, "total_knb" => 625000, "rate" => 0.13],
            ["name" => "Gói 10M", "amount" => 10000000, "knb" => 1000000, "bonus_percent" => 25, "bonus_knb" => 250000, "total_knb" => 1250000, "rate" => 0.13],
        ];
    
        return view('payment.index', compact('packages'));
    }
}

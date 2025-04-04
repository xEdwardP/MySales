<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $title = "Dashboard";
        $totalSales = Sale::sum('total');
        $quantitySales = Sale::count();
        $productsMinStock = Product::where('quantity', '<', 5)->get();
        $recentProducts = Sale::orderBy('created_at', 'desc')->take(5)->get();
        return view("modules.dashboard.home", compact('title', 'totalSales', 'quantitySales', 'productsMinStock', 'recentProducts'));
    }
}

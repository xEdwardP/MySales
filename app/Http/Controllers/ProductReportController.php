<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductReportController extends Controller
{
    public function index()
    {
        $title = "Reporte de productos";
        $items = Product::select(
            'products.*',
            'categories.name as category_name',
            'suppliers.name as supplier_name'
        )
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->get();

        return view('modules.products_report.index', compact('title', 'items'));
    }
}

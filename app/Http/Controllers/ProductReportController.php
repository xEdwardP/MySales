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
            'suppliers.name as supplier_name',
            'imagenes.path as imagen_product',
            'imagenes.id as imagen_id' 
        )
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->leftjoin('imagenes', 'products.id', '=', 'imagenes.product_id')
            ->get();

        return view('modules.products_report.index', compact('title', 'items'));
    }

    public function changeStock(){
        $title = "Actualizacion de Stock";
        $items = Product::select(
            'products.*',
            'categories.name as category_name',
            'suppliers.name as supplier_name',
            'imagenes.path as imagen_product',
            'imagenes.id as imagen_id' 
        )
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->leftjoin('imagenes', 'products.id', '=', 'imagenes.product_id')
            ->whereBetween('products.quantity', [0,1])
            ->get();

        return view('modules.products_report.change_stock', compact('title', 'items'));
    }
}

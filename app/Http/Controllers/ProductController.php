<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $title = "Productos";
        $items = Product::select(
            'products.*',
            'categories.name as category_name',
            'suppliers.name as supplier_name'
        )
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->get();

        return view('modules.products.index', compact('title', 'items'));
    }

    public function create()
    {
        $title = "Crear Producto";
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('modules.products.create', compact('title', 'categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        try {
            $item = new Product();
            $item->user_id = Auth::user()->id;
            $item->category_id = $request->category_id;
            $item->supplier_id = $request->supplier_id;
            $item->name = $request->name;
            $item->description = $request->description;
            $item->save();
            return to_route('products')->with('success', 'Producto creado exitosamente!');
        } catch (\Throwable $th) {
            return to_route('products')->with('error', 'Fallo al crear producto!' . $th->getMessage());
        }
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Imagen;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $title = "Productos";
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
            $item->code = $request->code;
            $item->name = $request->name;
            $item->description = $request->description;
            $item->save();
            
            $idproduct = $item->id;

            if($idproduct > 0){
                if($this->uploadImage($request, $idproduct)){
                    return to_route('products')->with('success', 'Producto creado exitosamente!');
                } else{
                    return to_route('products')->with('error', 'No se subio la imagen!!');
                }
            }
        } catch (\Throwable $th) {
            return to_route('products')->with('error', 'Fallo al crear producto!' . $th->getMessage());
        }
    }

    public function show(string $id)
    {
        $title = "Eliminar producto";
        $items = Product::select(
            'products.*',
            'categories.name as category_name',
            'suppliers.name as supplier_name'
        )
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->where('products.id', $id)
            ->first();
        return view('modules.products.show', compact('title', 'items'));
    }

    public function edit(string $id)
    {
        $title = "Editar producto";
        $categories = Category::all();
        $suppliers = Supplier::all();
        $item = Product::find($id);
        return view('modules.products.edit', compact('title', 'item', 'categories', 'suppliers'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $item = Product::find($id);
            $item->category_id = $request->category_id;
            $item->supplier_id = $request->supplier_id;
            $item->code = $request->code;
            $item->name = $request->name;
            $item->description = $request->description;
            $item->selling_price = $request->selling_price;
            $item->save();
            return to_route('products')->with('success', 'Producto actualizado exitosamente!!');
        } catch (\Throwable $th) {
            return to_route('products')->with('error', 'Fallo al actualizar producto!' . $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $item = Product::find($id);
            $item->delete();
            return to_route('products')->with('success', 'Producto eliminado exitosamente!!');
        } catch (\Throwable $th) {
            return to_route('products')->with('error', 'Fallo al eliminar producto!' . $th->getMessage());
        }
    }

    public function state($id, $state)
    {
        $item = Product::find($id);
        $item->active = $state;
        return $item->save();
    }

    public function uploadImage($request, $idproduct){
        $pathImage = $request->file('imagen')->store('imagenes', 'public');
        $nameImage = basename($pathImage);

        $item = new Imagen();
        $item->product_id = $idproduct;
        $item->name = $nameImage;
        $item->path = $pathImage;
        return $item->save();
    }

    public function show_image($id) {
        $title = 'Editar imagen';
        $item = Imagen::find($id);
        return view('modules.products.show-image', compact('title', 'item'));
    }

    public function update_image(Request $request, $id){
        try {
            $item = Imagen::find($id);

            if($item->path && Storage::disk('public')->exists($item->path)){
                Storage::disk('public')->delete($item->path);
            }
            
            $pathImagen = $request->file('imagen')->store('imagenes', 'public');
            
            $nameImage = basename($pathImagen);
            $item->path = $pathImagen;
            $item->name = $nameImage;
            $item->save();
            return to_route('products')->with('success', 'Imagen Actualizada exitosamente!!');
        } catch (\Throwable $th) {
            return to_route('products')->with('error', 'No se pudo actualizar la imagen!!');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $title = "Categorias";
        $items = Category::all();
        return view('modules.categories.index', compact('title', 'items'));
    }

    public function create()
    {
        $title = "Nueva Categoría";
        return view('modules.categories.create', compact('title'));
    }

    public function store(Request $request)
    {
        $item = new Category();
        $item->user_id = Auth::user()->id;
        $item->name = $request->name;
        $item->save();
        return to_route('categories');
    }

    public function show(string $id)
    {
        $title = "Eliminar Categoría";
        $item = Category::find($id);
        return view('modules.categories.show', compact('item', 'title'));
    }

    public function edit(string $id)
    {
        $title = "Actualizar Categoría";
        $item = Category::find($id);
        return view('modules.categories.edit', compact('item', 'title'));
    }

    public function update(Request $request, string $id)
    {
        $item = Category::find($id);
        $item->name = $request->name;
        $item->save();
        return to_route('categories');
    }

    public function destroy(string $id)
    {
        $item = Category::find($id);
        $item->delete();
        return to_route('categories');
    }
}

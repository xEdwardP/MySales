<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $title = "Proveedores";
        $items = Supplier::all();
        return view('modules.suppliers.index', compact('title', 'items'));
    }

    public function create()
    {
        $title = "Agregar proveedor";
        return view('modules.suppliers.create', compact('title'));
    }

    public function store(Request $request)
    {
        try {
            $item = new Supplier();
            $item->name = $request->name;
            $item->phone = $request->phone;
            $item->email = $request->email;
            $item->cp = $request->cp;
            $item->website = $request->website;
            $item->notes = $request->notes;
            $item->save();
            return to_route('suppliers')->with("success", "Proveedor agregado con exito");
        } catch (\Throwable $th) {
            return to_route('suppliers')->with("error", "Fallo al agregar proveedor!!!" . $th->getMessage());
        }
    }

    public function show(Supplier $supplier)
    {
        //
    }

    public function edit(string $id)
    {
        $item = Supplier::find($id);
        $title = "Editar Proveedor";

        return view ('modules.suppliers.edit', compact('item', 'title'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $item = Supplier::find($id);
            $item->name = $request->name;
            $item->phone = $request->phone;
            $item->email = $request->email;
            $item->cp = $request->cp;
            $item->website = $request->website;
            $item->notes = $request->notes;
            $item->save();
            return to_route('suppliers')->with('success', 'Actualizado con exito');
        } catch (\Throwable $th) {
            return to_route('suppliers')->with('error', 'No se pudo actualizar' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}

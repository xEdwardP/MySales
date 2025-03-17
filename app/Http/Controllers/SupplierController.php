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

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}

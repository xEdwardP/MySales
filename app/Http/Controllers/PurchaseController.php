<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index()
    {
        $title = "Compras";
        $items = Purchase::select(
            'purchases.*',
            'users.name as user_name',
            'products.name as product_name'
        )
            ->join('users', 'purchases.user_id', '=', 'users.id')
            ->join('products', 'purchases.product_id', '=', 'products.id')
            ->get();

        return view('modules.purchases.index', compact('title', 'items'));
    }

    public function create($id)
    {
        $title = "Comprar productos";
        $item = Product::find($id);
        return view('modules.purchases.create', compact('title', 'item'));
    }

    public function store(Request $request)
    {
        try {
            $item = new Purchase();
            $item->user_id = Auth::user()->id;
            $item->product_id = $request->id;
            $item->quantity = $request->quantity;
            $item->purchase_price = $request->purchase_price;
            if ($item->save()) {
                $item = Product::find($request->id);
                $item->quantity = ($item->quantity + $request->quantity);
                $item->purchase_price = $request->purchase_price;
                $item->save();
            }
            return to_route('products')->with('success', 'Compra exitosa!');
        } catch (\Throwable $th) {
            return to_route('products')->with('error', 'No pudo comprar!' . $th->getMessage());
        }
    }

    public function show(string $id)
    {
        $title = "Compras";
        $items = Purchase::select(
            'purchases.*',
            'users.name as user_name',
            'products.name as product_name'
        )
            ->join('users', 'purchases.user_id', '=', 'users.id')
            ->join('products', 'purchases.product_id', '=', 'products.id')
            ->where('purchases.id', $id)
            ->first();

        return view('modules.purchases.show', compact('title', 'items'));
    }

    public function edit(string $id)
    {
        $title = "Editar Compra";
        $item = Purchase::select(
            'purchases.*',
            'users.name as user_name',
            'products.name as product_name'
        )
            ->join('users', 'purchases.user_id', '=', 'users.id')
            ->join('products', 'purchases.product_id', '=', 'products.id')
            ->where('purchases.id', $id)
            ->first();

        return view('modules.purchases.edit', compact('title', 'item'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $previousQuantity = 0;
            $item = Purchase::find($id);
            $previousQuantity = $item->quantity;
            $item->quantity = $request->quantity;
            $item->purchase_price = $request->purchase_price;

            if ($item->save()) {
                $item = Product::find($request->product_id);
                $previousQuantity = $item->quantity - $previousQuantity;
                $item->quantity = $previousQuantity + $request->quantity;
                $item->save();
                return to_route('purchases')->with('success', 'Compra actualizada con exitosa!');
            }
        } catch (\Throwable $th) {
            return to_route('purchases')->with('error', 'No pudo actualizar la comprar!' . $th->getMessage());
        }
    }

    public function destroy(string $id, Request $request)
    {
        try {
            $item = Purchase::find($id);
            $purchaseQuantity = $item->quantity;
            if ($item->delete()) {
                $item = Product::find($request->product_id);
                $item->quantity = $item->quantity - $purchaseQuantity;
                $item->save();
                return to_route('purchases')->with('success', 'Compra eliminada con exito!');
            } else {
                return to_route('purchases')->with('error', 'Compra no se elimino!');
            }
        } catch (\Throwable $th) {
            return to_route('purchases')->with('error', 'No se pudo eliminar la compra!' . $th->getMessage());
        }
    }
}

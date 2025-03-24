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
            ->join('products', 'purchases.product_id', '=' , 'products.id')
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

    public function show(Purchase $purchase)
    {
        //
    }

    public function edit(Purchase $purchase)
    {
        //
    }

    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    public function destroy(Purchase $purchase)
    {
        //
    }
}

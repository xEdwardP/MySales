<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SaleController extends Controller
{
    public function index()
    {
        $title = "Ventas";
        $items = Product::all();
        return view('modules.sales.index', compact('title', 'items'));
    }

    public function addCart($idproduct)
    {
        $item = Product::find($idproduct);
        $stock = $item->quantity;

        $cartItems = Session::get('cartItems', []);

        $response = false;

        foreach ($cartItems as $key => $cart) {
            if ($cart['id'] == $idproduct) {
                if ($cart['quantity'] >= $stock) {
                    return to_route('new-sale')->with('error', 'No hay stock suficiente!!!');
                }
                $cartItems[$key]['quantity'] += 1;
                $response = true;
                break;
            }
        }

        if (!$response) {
            $cartItems[] = [
                'id' => $item->id,
                'code' => $item->code,
                'name' => $item->name,
                'quantity' => 1,
                'price' => $item->selling_price
            ];
        }

        Session::put('cartItems', $cartItems);


        return to_route('new-sale');
    }

    public function deleteCart()
    {
        Session::forget('cartItems');
        return to_route('new-sale');
    }


    public function removeCart($idproduct)
    {
        $cartItems = Session::get('cartItems', []);
        foreach ($cartItems as $key => $cart) {
            if ($cart['id'] == $idproduct) {
                if ($cart['quantity'] > 1) {
                    $cartItems[$key]['quantity'] -= 1;
                } else {
                    unset($cartItems[$key]);
                }
                break;
            }
        }
        Session::put('cartItems', $cartItems);
        return to_route('new-sale');
    }
}

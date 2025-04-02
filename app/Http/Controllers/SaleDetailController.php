<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    public function index(){
        $title = "Detalles de Ventas";
        $items = Sale::select(
            'sales.*',
            'users.name as user_name'
        )
        ->join('users', 'sales.user_id', '=', 'users.id')
        ->orderBy('sales.created_at', 'desc')
        ->get();
        return view('modules.sales_details.index', compact('title', "items"));
    }

    public function view_details($id){
        $title = "Detalle de venta";
        $sale = Sale::select(
            'sales.*',
            'users.name as user_name'
        )
        ->join('users', 'sales.user_id', '=', 'users.id')
        ->where('sales.id', $id)
        ->firstOrFail();

        $details = SaleDetail::select(
            'sale_details.*',
            'products.name as product_name'
         )
         ->join('products', 'sale_details.product_id', '=', 'products.id')
         ->where('sale_id', $id)
         ->get();

         return view('modules.sales_details.sale_details', compact('title', 'sale', 'details'));
    }
}

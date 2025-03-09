<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    public function index(){
        return view('modules.sales_details.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders()
    {
        $viewData=[];
        $viewData['title'] = "Minhas Compras - Online Store";
        $viewData['subtitle'] = "Minhas Compras";
        $viewData['orders'] = Order::with(['items.product'])->where('user_id', Auth::user()->id);
        //dd($viewData);

        return view('myaccount.orders', compact('viewData'));
    }
}

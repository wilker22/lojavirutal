<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders()
    {
        $viewData=[];
        $viewData['title'] = "Minhas Compras - Loja Virtual";
        $viewData['subtitle'] = "Meus Pedidos";
        $viewData["orders"] = Order::with(['items.product'])->where('user_id', Auth::id())->get();
               
        return view('myaccount.orders', compact('viewData'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Produtos - Loja Virtual";
        $viewData["subtitle"] = "Lista de Produtos";
        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product["name"] . " - Loja Virtual";
        $viewData["subtitle"] = $product["name"] . " - Informações do Produto";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }
}

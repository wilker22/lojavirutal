<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Vitrine - Loja Virtual";
        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData = [];
        $viewData["title"] = "Sobre nós - Loja Virtual";
        $viewData["subtitle"] = "Sobre nós";
        $viewData["description"] = "Nossa história ...";
        $viewData["author"] = "Desenvolvido por: WTech - Consultoria em T.I.";
        return view('home.about')->with("viewData", $viewData);

    }
}

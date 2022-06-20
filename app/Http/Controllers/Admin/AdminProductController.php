<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData=[];
        $viewData['title'] = "Painel Administrativo - Produtos - Loja Virtual";
        $viewData['products'] = Product::all();
        return view('admin.products.index')->with('viewData', $viewData);
    }
     public function store(Request $request)
     {
        $request->validate([
            "name" => 'required|max:255',
            "description" => 'required',
            "price" => 'required|numeric|gt:0',
            "image" => 'image'
        ]);

        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->description = $request->description;
        $newProduct->price = $request->price;
       
        if($request->hasFile('image')){
            $imageName = $newProduct->id.".".$request->image->extension();
            Storage::disk('public')->put(
                                        $imageName, 
                                        file_get_contents($request->image->getRealPath())
                                    );

        }
        $newProduct->image = $imageName;

        $newProduct->save();
        return back();
     }

     
     public function edit($id)
     {
        $viewData = [];
        $viewData["title"] = "Painel Administrativo - Editar Produto - Loja Virtual";
        $viewData["product"] = Product::findOrFail($id);
        return view('admin.products.edit')->with("viewData", $viewData);
     }

     public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            'image' => 'image',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        
        if ($request->hasFile('image')) {
        $imageName = $product->id.".".$request->file('image')->extension();
        Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
                );
            $product->image = $imageName;
        }
        
        $product->save();
        return redirect()->route('admin.products.index');
    }

   
     public function delete($id)
     {  
        Product::destroy($id);
        return back();
     }
}

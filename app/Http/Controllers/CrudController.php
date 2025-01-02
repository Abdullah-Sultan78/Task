<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CrudController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('index',compact('products'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'description' =>'required',
            'image' =>'required',
            'price' => 'required',
        ]);
        
        // testing
        // return $request->all();
        Product::newProduct($request);
       return back()->with('meassage','Product  created successfully.');
    }

    public function edit($id)
    {
         return view('edit',['product'=>Product::find($id)]);
    }

    public function update(Request $request,$id)
    {
       Product::updateProduct($request,$id);
       return redirect('/')->with('meassage','Product update successfully.');
    }


    public function delete(Request $request,$id)
    {
       Product::deleteProduct($request,$id);
       return back()->with('meassage','Product delete successfully.');
    }
}

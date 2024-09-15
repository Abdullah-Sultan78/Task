<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        $categories=Category::all();
        
        return view('backend.product.index',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        // $categories = Category::where('status',1 )->select('name','id')->get();
        return view('backend.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         Product::storeProduct($request);
         return back()-> with('message','Product added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $product = Product::find( $id);
        $categories = Category::all();
        return view('backend.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'title' => 'required',
            // 'name' => 'required',
            'category_id' => 'required',
            // 'image' => 'image'
        ]);
        Product::updateProduct( $request,$id);
        return to_route('products.index')->with('message','Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            Product::deleteProduct($id);
            return back() -> with('message','Product Deleted Successfully!');
        }
    }
}

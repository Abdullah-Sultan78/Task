<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
       return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Category::create ([
        'name' => $request->name
       ]);
    //    return back()->with( 'msg' , 'Category added successfully');
       return back()->with('message','Category added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find( $id);
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Category::updateCategory( $request,$id);
        return to_route('categories.index')->with('message','Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::deleteCategory($id);
        return back() -> with('msg','Category Deleted Successfully!');
    }
}

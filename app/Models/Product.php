<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public static $product,$image;
    public static function storeProduct($request){
        self::$product = new Product;
        self::$product->name = $request->name;
        self::$product->category_id = $request->category_id;
        self::$product->price = $request->price;
        self::$product->quantity = $request->quantity;
        self::$product->description = $request->description;
        self::$product->image = imageUpload($request->image, 'products-images');
        
        self::$product->save();

       
    }

    // private static function getImage($request){
    //     self::$image = $request->file('image'); 
    //     self::$imageName = rand().'.'.self::$image->getClientOriginalExtension();
    //     self::$directory = 'blog-image/';
    //     self::$imgUri =  self::$imageName. self::$directory;
    //     self::$image->move(self::$directory, self::$imageName);
    //     return   self::$imgUri;
    // }  

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public static function updateProduct($request,$id){
        self::$product = Product::find($id);
        self::$product->category_id = $request->category_id;
        self::$product->name = $request->name;
        self::$product->price = $request->price;
        self::$product->description = $request->description;
        if($request->image){
            if(file_exists(self::$product->image)){
                unlink(self::$product->image);
            }
            // self::$product->image       = self::imageUpload($request->image, 'products-images'); 
            self::$product->image = imageUpload($request->image, 'products-images');


        }
        self::$product->save();
    }

    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        self::$product->delete();
    }
    
}


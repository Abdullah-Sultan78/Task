<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

    public function user()
    {
        return  $this -> hasOne('App\Models\User','id','user_id');
    }


    public function product()
    {
        return  $this -> hasOne('App\Models\Product','id','product_id');
    }


    // public static $cart,$product;

    // public static function add_cart($request,$product){
    //     $user = Auth::user();
    //     self:: $cart = new Cart;
    //     self:: $cart->user_id = $user->user_id;
    //     self:: $cart->product_id = $product->product_id ;
    //     self:: $cart->price = $product->price;
    //     self:: $cart->quantity = $request->quantity;
    //     self:: $cart->save();
    // }
    // public static function updateCart($request, $id)
    // {
    //     self::$cart = Cart::find($id);
    //     self::$cart->name = $request->name;
    //     self::$cart->save();
    // }

}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Can;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts=Cart::where('user_id',Auth::id())->get();
        $categories = Category::all();
        return view('frontend.cart.checkout',compact('categories','carts'));
    }
    public function cash_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $carts = Cart::where('user_id', $userid )->get();
        foreach($carts as $cart)
        {
            $order = new Order;
            $order->name = $name;
            $order->address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $cart->product_id;
            $order->save();

        }
        $carts_remove = Cart::where('user_id',$userid)->get();
        foreach($carts_remove as $remove)
        {
            $data = Cart::find($remove->id);
            $data ->delete();
        }
        toastr()->timeOut(10000)->closeButton()->addSuccess(' Product Ordered Successfully');
        return redirect()->back();

    }
}

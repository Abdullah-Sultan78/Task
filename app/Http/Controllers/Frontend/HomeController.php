<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function auth()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user') {
                $categories = Category::all();
                $products = Product::all();
                return view('frontend.home.index', compact('categories', 'products'));
            } else if ($usertype == 'admin') {
                return view('backend.home.index');
            } else {
                return redirect()->back();
            }
        }
    }


    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        // $products = Product::paginate(3);
        return view('frontend.home.index', compact('categories', 'products'));
    }
    public function details($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('frontend.home.details', compact('categories', 'product'));
    }
    public function contact()
    {
        $categories = Category::all();
        return view('frontend.contact.contact', compact('categories'));
    }

    //add product in the cart
    public function add_cart(Request $request, $id)
    {
        $user = Auth::user();
        $product = product::find($id);
        $cart = new cart;
        $cart->user_id = $user->id;
        $cart->product_id = $product->id;
        $cart->price = $product->price * $request->quantity;
        $cart->quantity = $request->quantity;
        $cart->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess(' Product Added to the Cart  Successfully');
        return redirect()->back();

        // dd($product);

        //experiment ...............
        //  Cart::add_cart($request);
        //  return back()-> with('message','Cart added Successfully');
    }
    // public function add_cart(Request $request,$id)
    // {
    // if(Auth::id())
    // {
    //    $product_id = $id;
    //    $user = Auth::user();
    //    $user_id = $user->id;

    //    $data= new Cart;
    //    $data->user_id=$user->id;
    //    $data->product_id= $products->id;
    //    $data->price = $product->price;
    //    $data->quantity=$request->quantity;
    //    $data->save();

    //    $user=auth()->user();
    //    $product=product::find($id);
    //    $cart= new cart;
    //    $cart->user_id=$user->id;
    //    $cart->Product_id= $product->id;
    //    $cart->quantity=$request->quantity;
    //    $cart->price = $product->price;
    //    $cart->save();
    //    return redirect()->back();
    // }
    // else
    // {
    //    return redirect('login');
    // }
    // }

    //show cart data
    public function show_cart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $carts = Cart::where('user_id', $userid)->get();
        }
        $categories = Category::all();
        return view('frontend.cart.showcart', compact('categories', 'carts'));
    }

    // remove cart
    public function remove_cart($id)
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    // update cart

    public function update(Request $request, $id)
    {

        Cart::updated($id,$request->quantity);
        return redirect('/show_cart');
    }

        // $user = Auth::user();
        // $product = product::find($id);
        // $cart= cart::find($product->input('id'));
        // $cart = Cart::find('id');
        // $cart->user_id = $user->id;
        // $cart->product_id = $product->id;
        // $cart->quantity = $cart->input('quantity');
        // $cart->save();
        // toastr()->timeOut(10000)->closeButton()->addSuccess(' Update Product quantity  Successfully');
        // return redirect()->back();

        //update cart
        // public function update(Request $request, string $id)
        // {
        //     Cart::updateCart( $request,$id);
        //     return back();
        // }

        // public function cart_update(Request $request,$id)
        // {
        //     $cart  = cart::find($id);

        //     $cart->update([
        //             'quantity'=> $request->quantity,
        //       ]);
        //     return redirect()->back();
        // Cart::where('id',$id)->where('user_id',request()->id())->update([
        //     'quantity' => $request->quantity,
        // ]);
        // $carts = $request->all();
        // foreach($carts['quantity'] as $cart_id=>$quantity){
        //     cart::find($cart_id)->update([
        //         'quantity'=>$quantity,
        //     ]);

        // }
        // return redirect()->back()->with('update', 'Cart Update Successfully');
    // }
}

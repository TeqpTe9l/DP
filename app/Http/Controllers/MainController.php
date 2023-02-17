<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; 
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function contact()
    {
        return view('home.contact');
    }

    public function index()
    {
        $cart_count = Cart::all()->count();

        $elements = Cart::get()->where('user_id',Auth::user()->id);
        
        $total = 0;
        foreach ($elements as $element){
            $total += $element->price * $element->quantity;
        }
      
        return view('home.cart', compact('elements', 'total'),[

            'cart_count'=> $cart_count,
        ]);
    }

    public function create(Request $request)
    {
        if (Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->count()!=0 ) {
            Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->increment('quantity', 1);
        } else {
            Cart::create($request->all());
        }
        return redirect()->route('cart');
    }

    public function destroy($id)
    {
        Cart::find($id)->delete();
        return back();
    }

    public function plus($id)
    {
        Cart::find($id)->increment('quantity', 1);
        return back();
    }

    public function minus($product_id)
    {
        if (Cart::find($product_id)->quantity === 1) {
            Cart::find($product_id)->delete();
        } else {
            Cart::find($product_id)->decrement('quantity');
        }
        return back();
    }

    public function clear(){
        Cart::where('user_id',Auth::user()->id)->delete();
        return back();
    }

    public function checkout()
    {
        return view('home.checkout');
    }

    
}

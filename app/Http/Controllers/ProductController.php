<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;

class ProductController extends Controller
{
    public function show($cat, $product_id){
            $item = Product::where('id',$product_id)->first();
            $cat = Category::where('id',$item->category_id)->first();
            
            return view('home.product',[
            'item' => $item,
            'cat'=> $cat,
        ]);
    }

    public function showCategory(Request $request, $cat_alias){
        $cat = Category::where('alias', $cat_alias)->first();

        $paginate = 8;
        $products = Product::where('category_id', $cat->id)->paginate($paginate);
        
        if(isset($request->orderBy)){
            if($request->orderBy == 'price-low-high'){
                $products = Product::where('category_id', $cat->id)->orderBy('new_price')->paginate($paginate);
            }
            if($request->orderBy == 'price-high-low'){
                $products = Product::where('category_id', $cat->id)->orderBy('new_price','desc')->paginate($paginate);
            }
            if($request->orderBy == 'price-a-z'){
                $products = Product::where('category_id', $cat->id)->orderBy('title')->paginate($paginate);
            }
            if($request->orderBy == 'price-z-a'){
                $products = Product::where('category_id', $cat->id)->orderBy('title','desc')->paginate($paginate);
            }
        }
        
        if($request->ajax()){
            return view('ajax.order-by',[
            'products' => $products
            ])->render();
        }
        
        return view('home.categories',[
            'cat'=> $cat,
            'products' => $products,
        ]);

    }
}

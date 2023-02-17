<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    public function productTable() {

        $product = Product::get();

        return view('admin.pages.tables.product.product',[
            'product'=> $product,
        ]);
    }

    public function productDetails($id) {
        
        $product= Product::get()->find($id);

        return view ('admin.pages.tables.product.product_details', [
            'product'=> $product,
        ]);
    }

    public function productDelete($id) {
        Product::find($id)->delete();
        return back();
    }

    public function productCreate(){

        return view('admin.pages.tables.product.product_create');
    }

    public function productAdd(Request $req){

        $product = new Product();

        $product->title = $req->input('title');
        $product->price = $req->input('price');
        $product->new_price = $req->input('new_price');
        $product->in_stock = $req->input('in_stock');
        $product->description = $req->input('description');
        $product->category_id = $req->input('category_id');
        
        $product->save();
        
        return redirect()->route('admin_productTable');
    }

    public function productEdit($id) {
        $edit = Product::get()->find($id);
        
        return view ('admin.pages.tables.product.product_edit', [
        'edit'=> $edit,
        ]);
    }

    public function productUp($id,Request $req) {

        $product = Product::find($id);

        $product->title = $req->input('title');
        $product->price = $req->input('price');
        $product->new_price = $req->input('new_price');
        $product->in_stock = $req->input('in_stock');
        $product->description = $req->input('description');
        $product->category_id = $req->input('category_id');
        
        $product->save();
        
        return redirect()->route('admin_productTable', $id);
    }

}

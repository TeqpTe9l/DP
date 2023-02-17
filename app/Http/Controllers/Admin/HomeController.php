<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\suppliers;

class HomeController extends Controller
{
    public function index() 
    {
        $category_count = Category::all()->count();
        $product_count = Product::all()->count();
        $suppliers_count = Suppliers::all()->count();

        return view('admin.home.index',[
            
            'product_count'=> $product_count,
            'category_count'=> $category_count,
            'suppliers_count'=> $suppliers_count,
        ]);
    }

    public function calendar() 
    {
        return view('admin.pages.calendar');
    }
}

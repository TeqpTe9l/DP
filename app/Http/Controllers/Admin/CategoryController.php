<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function categoryTable() {

        $category = Category::get();

        return view('admin.pages.tables.category.category',[
            'category'=> $category,
        ]);
    }

    public function categoryDelete($id) {
        Category::find($id)->delete();
        return back();
    }

    public function categoryCreate(){

        return view('admin.pages.tables.category.category_create');
    }

    public function categoryAdd(Request $req){

        $category = new Category();

        $category->title = $req->input('title');
        $category->desc = $req->input('desc');
        $category->img = $req->input('img');
        $category->alias = $req->input('alias');
        
        $category->save();
        
        return redirect()->route('admin_categoryTable');
    }

    public function categoryEdit($id) {
        $edit = Category::get()->find($id);
        
        return view ('admin.pages.tables.category.category_edit', [
        'edit'=> $edit,
        ]);
    }

    public function categoryUp($id,Request $req) {

        $category = Category::find($id);

        $category->title = $req->input('title');
        $category->desc = $req->input('desc');
        $category->img = $req->input('img');
        $category->alias = $req->input('alias');
        
        $category->save();
        
        return redirect()->route('admin_categoryTable', $id);
    }
}

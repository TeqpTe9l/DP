<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\suppliers;

class SuppliersController extends Controller
{
    public function suppliersTable() {

        $suppliers = Suppliers::get();

        return view('admin.pages.tables.suppliers.suppliers',[
            'suppliers'=> $suppliers,
        ]);
    }

    public function suppliersDetails($id) {
        
        $suppliers= Suppliers::get()->find($id);

        return view ('admin.pages.tables.suppliers.suppliers_details', [
            'suppliers'=> $suppliers,
        ]);
    }

    public function suppliersDelete($id) {
        Suppliers::find($id)->delete();
        return back();
    }

    public function suppliersCreate(){

        return view('admin.pages.tables.suppliers.suppliers_create');
    }

    public function suppliersAdd(Request $req){

        $suppliers = new Suppliers();

        $suppliers->supplier = $req->input('supplier');
        $suppliers->country = $req->input('country');
        $suppliers->city = $req->input('city');
        $suppliers->street = $req->input('street');
        $suppliers->telephone = $req->input('telephone');
        
        $suppliers->save();
        
        return redirect()->route('admin_suppliersTable');
    }

    public function suppliersEdit($id) {
        $edit = Suppliers::get()->find($id);
        
        return view ('admin.pages.tables.suppliers.suppliers_edit', [
        'edit'=> $edit,
        ]);
    }

    public function suppliersUp($id,Request $req) {

        $suppliers = Suppliers::find($id);

        $suppliers->supplier = $req->input('supplier');
        $suppliers->country = $req->input('country');
        $suppliers->city = $req->input('city');
        $suppliers->street = $req->input('street');
        $suppliers->telephone = $req->input('telephone');
        
        $suppliers->save();
        
        return redirect()->route('admin_suppliersTable', $id);
    }
}

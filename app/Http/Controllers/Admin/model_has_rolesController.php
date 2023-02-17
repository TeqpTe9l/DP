<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\model_has_roles;

class model_has_rolesController extends Controller
{
    public function model_has_rolesTable() {

        $model_has_roles = model_has_roles::get();

        return view('admin.pages.tables.model_has_roles.model_has_roles',[
            'model_has_roles'=> $model_has_roles,
        ]);
    }

    public function model_has_rolesEdit($id) {
        $edit = model_has_roles::get()->find($id);
        
        return view ('admin.pages.tables.model_has_roles.model_has_roles_edit', [
        'edit'=> $edit,
        ]);
    }

    public function model_has_rolesUp($id,Request $req) {

        $model_has_roles = model_has_roles::find($id);

        $model_has_roles->role_id = $req->input('role_id');
        $model_has_roles->model_id = $req->input('model_id');
        
        $model_has_roles->save();
        
        return redirect()->route('admin_model_has_rolesTable', $id);
    }
}

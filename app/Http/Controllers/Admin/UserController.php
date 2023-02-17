<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userTable() {

        $user = User::get();

        return view('admin.pages.tables.user.user',[
            'user'=> $user,
        ]);
    }

    public function userDelete($id) {
        User::find($id)->delete();
        return back();
    }
}

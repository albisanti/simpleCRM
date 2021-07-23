<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountManager extends Controller
{
    public function ManageAccount(){
        $users = User::get();
        return view('accounts.manage',['rs' => $users]);
    }

    public function getAccount(Request $request){
        if(!empty($request->id)) {
            $user = User::find($request->id);
            if ($user) {
                return response()->json(['status' => 'success', 'html' => view('sections.user', ['rs' => $user, 'edit' => $request->edit == 'y'])->render()]);
            }
            return abort(404, 'No user found');
        }
        return abort(404, 'No ID');
    }
}

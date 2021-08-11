<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountManager extends Controller
{
    public function ManageAccount(){
        $users = User::where('email','!=','backup@nomail.com')->get();
        return view('accounts.manage',['rs' => $users]);
    }

    public function getAccount(Request $request){
        if(!empty($request->id) && empty($request->new)) {
            $user = User::find($request->id);
            if ($user) {
                return response()->json(['status' => 'success', 'html' => view('sections.user', ['rs' => $user, 'edit' => $request->edit == 'y','new' => ''])->render()]);
            }
            return abort(404, 'No user found');
        } elseif (!empty($request->new)) {
            return response()->json(['status' => 'success', 'html' => view('sections.user',['new' => true])->render()]);
        }
        return abort(404, 'No ID');
    }

    public function createAccount(Request $request){
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->to_reset = true;
        if($user->save()){
            if($request->delete === 'y'){
                $user->givePermissionTo('delete');
            }
            if($request->create === 'y'){
                $user->givePermissionTo('create');
            }
            if($request->export === 'y'){
                $user->givePermissionTo('export');
            }
            return response()->json(['status' => 'success']);
        }
        return false;
    }

    public function editAccount(Request $request){
        if(!empty($request->id)){
            $user = User::find($request->id);
            if($user){
                $user->email = $request->email;
                $user->name = $request->name;
                if(!empty($user->password)) {
                    $user->password = Hash::make($request->password);
                }
                $user->to_reset = true;
                if($user->save()){
                    if($request->delete === 'y'){
                        $user->givePermissionTo('delete');
                    } else {
                        $user->revokePermissionTo('delete');
                    }
                    if($request->create === 'y'){
                        $user->givePermissionTo('create');
                    } else {
                        $user->revokePermissionTo('create');
                    }
                    if($request->export === 'y'){
                        $user->givePermissionTo('export');
                    } else {
                        $user->revokePermissionTo('export');
                    }
                    return response()->json(['status' => 'success']);
                }
                return abort(404, 'Try again');
            }
            return abort(404, 'No user found');
        }
        return abort(404, 'No ID');
    }

    public function deleteAccount(Request $request){
        if(!empty($request->id)){
            $user = User::find($request->id);
            if($user){
                $user->delete();
                return response()->json(['status' => 'success']);
            }
            return abort(404, 'No user found');
        }
        return abort(404, 'No ID');
    }
}

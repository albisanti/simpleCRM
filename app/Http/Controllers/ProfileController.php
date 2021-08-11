<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showProfile(){
        return view('profile');
    }

    public function changePassword(Request $request){
        if(!empty($request->password) && !empty($request->newPassword)){
            $user = User::find(auth()->id());
            if(Hash::check($request->password,$user->password)){
                $user->password = Hash::make($request->newPassword);
                if($user->save()){
                    return response()->json(['status' => 'success']);
                }
                return response()->json(['status' => 'error','report' => 'An error has occured. Please try again in a few seconds.']);
            }
            return response()->json(['status' => 'error','report' => 'The old password is not correct']);
        }
        abort(404,'No password');
    }
}

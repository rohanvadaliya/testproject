<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request) {

        $request->validate([
         'name' => 'required',
         'email' => 'required|unique:users',
         'password' =>'required|min:8|max:12'
       ]);

       $user = new User;
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password =Hash::make($request->password);
       $query = $user->save();
        if($query)
        {
            return redirect()->route('/Dashboard')
                             ->with('success','You Have Been Successfully Registered');
        }
        else
        {
            return back()->with('fail','Something went Wrong');
        }
    }


}

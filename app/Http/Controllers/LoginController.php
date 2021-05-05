<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    // public function Dashboard()
    // {
    //     return redirect('Dashboard');
    // }


    public function index() {
        return view('login');
    }

    public function verifyUser(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $authorizedUser = Auth::attempt($validated);

        dd($authorizedUser);

        if($authorizedUser) {
            return redirect(route('dashboard'))->with('success', 'Welcome to Dashboard');
        } else {
            return back()->with('error', 'An error occured, Please try again');
        }

    }

    public function check(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $data = User::where('email',$email)->where('password',$password)->count(); // ->get()
        if($data == 1)
        {
            $record = User::where('email',$email)->where('password',$password)->get(); // fetch all record
            $request->session()->put('record',$record);
            return redirect('/Dashboard')->with('success','Login Successfully');
        }
        else
        {
            return redirect('/login')->with('message','Please Enter Valid Email & Password');
        }
    }

}

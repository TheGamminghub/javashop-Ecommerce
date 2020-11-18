<?php

namespace App\Http\Controllers;

// use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function index(){
        return view('admin.login');
    }
    public function store(Request $request){

        //validate the user
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // log the user in  //also create a guard
        $credentials = $request->only('email','password');

        if(! Auth::guard('admin')->attempt($credentials)){
            return back()->withErrors([
                'message' => 'Wrong Credentials pls try again' 
            ]);
        }

        //session msg
        session()->flash('msg','You have been Logged in !');

        //redirect
        return redirect('/admin');
    }

    
    public function logout() {
        auth()->guard('admin')->logout();

        session()->flash('msg','You have been logged out');

        return redirect('/admin/login');
    }

}

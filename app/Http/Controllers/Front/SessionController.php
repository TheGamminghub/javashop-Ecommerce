<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function index(){
        return view('front.sessions.index');
    }

    public function store(Request $request){

        //validate the user
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
       
        $request->validate($rules);
        // check user exits

        $data = request([
            'email',
            'password'
            ]);

        if( ! auth()->attempt($data) ){
            
            return back()->withErrors([
                'message' => 'wrong Credentials Please try again'
            ]);

        }

        //redirect
        return redirect('/user/profile');
    }


    public function logout(){
        auth()->logout();

        session()->flash('msg','You have been logout succefully');

        return redirect('/user/login');
    }
}

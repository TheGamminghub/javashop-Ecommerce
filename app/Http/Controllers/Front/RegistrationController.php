<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;

class RegistrationController extends Controller
{
    public function index(){
        return view('front.registration.index');
    }

    public function store(Request $request){

        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->with('msg','User Already Exists');
         }
        else{ 
            //validate the user
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'address' => 'required'
            ]);

            //save the data
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'address' => $request->address,
            ]);

            //sign the user in
            auth()->login($user);

            //redirect
            return redirect('/user/profile');
        }
    }
}

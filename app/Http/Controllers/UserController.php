<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
class UserController extends Controller
{
    

    public function index(){
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function show($id){
        //find the user
       
       $orders= Order::where('user_id',$id)->get();
        // Return array back to user details page
        return view('admin.users.details',compact('orders'));
        
    }
   
}

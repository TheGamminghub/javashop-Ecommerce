<?php

namespace App\Http\Controllers;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Product;
use App\Order;
use App\User;

class DashboardController extends Controller
{
    
    
    public function index(){
        $product = new Product();
        $order = new Order();
        $user = new User();

        return view('admin.dashboard',compact('product','order','user'));
    }
}

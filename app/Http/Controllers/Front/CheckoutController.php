<?php

namespace App\Http\Controllers\Front;

use App\Order;

use App\OrderItem;
use Carbon\Carbon;
use Mockery\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;


class CheckoutController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(){
        return view('front.checkout.index');
    }

    public function store(Request $request){
    
        $contents = Cart::instance('default')->content()->map(function($item) {
            return $item->model->name . ' ' . $item->qty;
        })->values()->toJson();

       try{
            Stripe::charges()->create([
                'amount' => Cart::total(),
                'currency' => 'INR',
                'source' => 'tok_visa',
                'description' => 'Some Text',
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count()
                ]
            ]);

             // Insert into orders table
             $order = Order::create([
                'user_id' => auth()->user()->id,
                'date' => Carbon::now(),
                'address' => $request->address,
                'status' => 0
            ]);

             // Insert into order items table
             foreach (Cart::instance('default')->content() as $item) {

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->model->id,
                    'quantity' => $item->qty,
                    'price' => $item->price
                ]);

            }

            Cart::instance('default')->destroy();

            
             // Success
            return redirect()->back()->with('msg','Success Thank you');
               

            

           

        }catch (Exception $e) {
        // Code
        }

    }
    
       
    
}

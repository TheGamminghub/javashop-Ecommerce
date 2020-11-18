<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function create(){
        $product = new Product();
        return view('admin.products.create',compact('product'));
    }

    public function store(Request $request){
        
        //validate the form
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>'image|required',

        ]);

        //upload the image

        if($request->hasFile('image')) {
            $image = $request->image;
            $image->move('uploads',$image->getClientOriginalName());
        }


        //save the data into database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' =>$request->image->getClientOriginalName()


        ]);
        //session msg

        $request->session()->flash('msg','your product has been added');
        //redirect
        return redirect('admin/products/create');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.products.edit',compact('product'));
    }

    public function update(Request $request, $id){
        // find the product
        $product = Product::find($id);

        //validate the form
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        // check if there any image
        if($request->hasFile('image')){

            //check if old image exist inside a folder
            if(file_exists(public_path('uploads/') . $product->image)){
               unlink(public_path('uploads/') . $product->image); 
            }

            //upload the new image
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());

            $product->image = $request->image->getClientOriginalName();
        }

        //update a product
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' =>$product->image
        ]);

        //store a msg in session
        $request->session()->flash('msg','your product has been Updated');

        //redirect
        return redirect('admin/products');
    }


    public function show($id){
        $product = Product::find($id);
        return view('admin.products.details',compact('product')); 

    }

    public function destroy($id){

        //Delete the product
        Product::destroy($id);

        //store a message
        session()->flash('msg','your product has been deleted');
        //redirect
        return redirect('admin/products');
    }

    
}

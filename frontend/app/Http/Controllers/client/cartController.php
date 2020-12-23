<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\product_table;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function show(){
        
        $data=[];
        $data['cart']=session()->has('cart') ? session()->get('cart'):[];
        dd($data);
        return view('client.pages.cart', $data);
    }
    
    public function add(Request $request)
    {
       
        $data = json_decode($_POST['data']);
        $product_id = $data['0']->product_id;

        dd($product_id);
        try{
            $this->validate($request,[
                'product_id' => 'required\numeric',
            ]);
        } catch(ValidationException $e){
                return redirect()->back();
        }

        $product=product_table::findOrFail($request->input('product_id'));
        $cart=session()->session()->has('cart') ? session()->get('cart'):[];
      
        if(array_key_exists($product->id, $cart)){
           $cart[$product->id]['quantity']++ ;
        }else{
            $cart[$product->id]=[
                'title'=>$product->product_title,
                'quantity'=>1,
                'price' =>($product->product_selling_price !== null && $product->product_selling_price >0) ? $product->product_selling_price : $product->product_price 
            ];
        }

        session(['cart'=>$cart]);

        session()->flush('massage', $product->title. 'Added To Cart..');

        return redirect('cart.show');













    }

}
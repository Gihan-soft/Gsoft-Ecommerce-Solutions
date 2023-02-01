<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller

{

    public function cart(){
        return view('frontend.pages.cart.index');
    }



    public function cartStore(Request $request){
         //dd($request->all());
         $product_qty=$request->input('product_qty');
         $product_id=$request->input('product_id');
         $product=Product::getProductByCart($product_id);
         $price=$product[0]['offer_price'];
         
         $cart_array=[];

         foreach(Cart::instance('shopping')->content() as $item){
            $cart_array[]=$item->id;
         }

         $result=Cart::instance('shopping')->add($product_id,$product[0]['title'],$product_qty,$price)
                  ->associate('App\Models\Product');   //pass value to product image
        
        if($result){
            $response['status']=true;
            $response['product_id']=$product_id;
            $response['total']=Cart::subtotal();
            $response['cart_count']=Cart::instance('shopping')->count();
            $response['message']="Item was added to your cart";
        }
        if($request->ajax()){
            $header=view('frontend.layouts.header')->render();  //pass the cart count to view
            $response['header']=$header;
        }
        return json_encode($response);

    }

    public function cartDelete(Request $request){

        //dd($request->all());   //dd() pass output inspect network
            $id=$request->input('cart_id');
            $result=Cart::instance('shopping')->remove($id);
            $response['statue']=true;
            $response['message']="Cart Successfully Removed";
            $response['total']=Cart::subtotal();
            $response['cart_count']=Cart::instance('shopping')->count();
            if($request->ajax()){
            $header=view('frontend.layouts.header')->render();  //pass the cart count to view
            $response['header']=$header;
            
        }
        return $response;
        

    }

    public function cartUpdate(Request $request){
        
        $this->validate($request,[
            'product_qty'=>'required|numeric',
        ]);

        $rowId=$request->input('rowId');
        $request_quantity=$request->input('product_qty');
        $productQuantity=$request->input('productQuantity');

        if($request_quantity>$productQuantity)  //check stkquan and req quan
        {
            $messsage="We currently do not have enough items";
            $response['status']=false;
        }
        elseif($request_quantity<1)
        {
            $messsage="You can't add less than 1 quantity";
            $response['status']=false;
        }
        else
        {
            Cart::instance('shopping')->update($rowId,$request_quantity);
            $messsage="Quantity was updated successfully";
            $response['status']=true;
            $response['total']=Cart::subtotal();
            $response['cart_count']=Cart::instance('shopping')->count();
        }

        if($request->ajax()){
            $header=view('frontend.layouts.header')->render();  //pass the cart count to view
            $cart_list=view('frontend.layouts._cart-lists')->render();
            $response['header']=$header;
            $response['cart_list']=$cart_list;
            $response['message']=$messsage;
        }
        return $response;


    }


    //coupon 

    public function couponAdd(Request $request)
    {
        $coupon=Coupon::where('code',$request->input('code'))->first();
        if(!$coupon){
            return back()->with('error','invalid coupon code,please enter valid coupon code');
        }
        if($coupon){
            $total_price=Cart::instance('shopping')->subtotal();
            session()->put('coupon',[
                'id'=>$coupon->id,
                'code'=>$coupon->code,
                'value'=>$coupon->discount($total_price),

            ]);
            return back()->with('success','Coupon Applied Successfully');
        }
        
    }

   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserOrder;
use Session;

class CartController extends Controller
{
    public function CartProducts(){
        return view('frontend.carts.carts_products');
    }

    public function addTocart($id){
        $data = Product::findOrFail($id);
        $cart_product = session()->get('cart', []);
        if(isset($cart_product[$id])){
            Session::flash('error', 'Item already in your cart');
            return back();
        }else{
            $cart_product[$id] = [
                "name" => $data->menu_name,
                "id" => $data->id,
                "price" => $data->price,
                "quantity" => 1,
                "image" => $data->image,
                "user_id" => $data->user_id,
            ];
        }
        session()->put('cart', $cart_product);
        session()->flash('success', 'Item in your cart');
        return redirect()->back();
    }

    public function remove_from_cart($id){
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Item removed from your cart');
            return back();
        }
    }


    public function CheckoutProducts(){
        return view('frontend.carts.checkout');
    }



    public function updateCart(Request $request){
        if ($request->product_id) {
            $cart = session()->get('cart');
            $qty = $cart[$request->product_id]['quantity'];
            $cart[$request->product_id]["quantity"] = $request->qty;
            session()->put('cart', $cart);
            // session()->flash('success', 'Cart updated successfully');
            return view('frontend.carts.updatecart');
        } 
    }



    public function PlaceOrderProducts(Request $request){
        $order_details = new UserOrder();
        $order_details->user_id = $request->user_id;
        $order_details->buyer_name = $request->buyer_name;
        $order_details->contact = $request->buyer_contact;
        $order_details->email = $request->email;
        $order_details->address = $request->address;
        $order_details->specefics = $request->specefic;
        $order_details->order_id = $request->order_id;
        $order_details->total  = $request->total;
        $order_details->details = json_encode($request->product_details);
        $order_details->save(); 
        session()->forget('cart');
        session()->flash('success', 'Order placed success!');
        return $this->sendInvoiceMail($order_details, $request);
    
    }


    public function sendInvoiceMail($order_details, $request){
        $invoice_created_at = UserOrder::where('order_id', $request->order_id)->get();
        \Mail::to($order_details->email)->send(new \App\Mail\sendInvoiceMail($order_details));
        return view('frontend.carts.order_details', compact('order_details', 'invoice_created_at'));
    }



    public function ESuccess(Request $request){
        if(isset($request->amt) && isset($request->refId)){
            $a = explode('&oid=', url()->full())[1];
            $oid = explode('&refId=', $a)[0];
            $record = UserOrder::where('order_id', $request->oid)->first();
            $url = "https://uat.esewa.com.np/epay/transrec";
            $data =[
                'amt'=> $record->total,
                'rid'=> $request->refId,
                'pid'=>$record->order_id,
                'scd'=> 'EPAYTEST'
            ];

			    $record->status = "paid";
                $record->payment = "esewa";
                $record->esewa_rid = $request->refId;
                $record->esewa_oid = $oid;
			    $record->save();
                return redirect('/')->with('success_message', 'Transaction completed.');
        }
    }


    public function payment_response()
	{
		return redirect('/')->with('success_message', 'We have received your order.');
	}

    public function EFail(Request $request){
        return redirect('/')->with('error_message', ' You have cancelled your transaction .');
    }
}

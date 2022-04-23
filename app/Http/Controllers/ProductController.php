<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserOrder;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prodIndex()
    {
        $breadcrum = "Add Menu Item";
        return view('admin.pages.product', compact('breadcrum'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function prodStore(Request $request)
    {
        // return $request->input();
         //Insert Data into DB
        $menu = new Product;
        $menu-> menu_name  = $request->menu_name;
        $menu-> category  = $request->cat;
        $menu-> description = $request->description;
        $menu-> price = $request->price;
        $menu->user_id = Auth::user()->id;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //geting image extension
            $filename = time().'.'.$extension;
            $file->move('uploads/product/',$filename);
            $menu->image=$filename;
        }
        $save = $menu->save();

        if($save){
            return redirect('/admin/show-product')->with('success','Your Menu has been successfuly ');
        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function prodShow(Product $product)
    {
        $breadcrum = "Menu Item";
        $items = Product::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.pages.productlist',["menu"=>$items, 'breadcrum'=> $breadcrum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productEdit($id)
    {
       $data= Product::find($id);
        return view('admin.pages.productedit',['item'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productUpdate(Request $request)
    {
        //update Data into DB
        $menu = Product::find($request->input('id'));
        $menu-> menu_name  = $request->input('menu_name');
        $menu-> category  = $request->input('cat');
        $menu-> description  = $request->input('description');
        $menu-> price  = $request->input('price');
        $menu->user_id = Auth::user()->id;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //geting image extension
            $filename = time().'.'.$extension;
            $file->move('uploads/product/',$filename);
            $menu->image=$filename;
        }
        $save = $menu->save();

        if($save){  
           return redirect('/admin/show-product')->with('success','Your Menu has been successfuly updated ');
        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productDestroy($id){

        Product::find($id)->delete();
        Session::flash('status','Menu-Items Deleted successfuly');
        return redirect('/admin/show-product');

    }




    //mange order 
    public function MangeOrder(){
        // $data = UserOrder::orderBy('created_at', 'desc')->get();
        $data = UserOrder::orderBy('created_at', 'desc')->paginate(12);
        $breadcrum = "Manage Order";
        return view('admin.pages.orderMange', compact('data', 'breadcrum'));
    }
    

    public function PassOrder($id){
        $data = UserOrder::findOrFail($id);
        $data->passed = 1;
        $data->save();
        return back();
    }

    public function DeleteOrder($id){
        $data = UserOrder::findOrFail($id);
        $data->delete();
        return back();
    }

    public function TrackOrder(Request $request, $id){
        $data = UserOrder::findOrFail($id);
        $data->tracking = $request->tracking;
        if($request->tracking == "delivered"){
            $data->status = "paid";
        }
        $data->save();
        if($request->tracking == "shipping"){
            return $this->sendMail($data);
        }
        return back();
    }


    public function sendMail($data){
        \Mail::to($data->email)->send(new \App\Mail\deleveryInfoMail($data));
        return back();
    }



    //category
    public function AllCat(){
        $data = Category::all();
        return view('admin.pages.createCat', compact('data'));
    }

    public function StoreCat(Request $request){
        $data = new Category;
        $data->cat = $request->cat;
        $data->save();
        return back()->with('success','New Category added');
    }

    public function RemoveCat($id){
        $data =  Category::find($id);
        $data->delete();
        return back()->with('success','Data removed');
    }
    
    

}

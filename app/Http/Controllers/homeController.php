<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Inquery;
use App\Models\User;


class homeController extends Controller
{
    public function index(){
        $users = User::where('role', 'vendor')->latest()->take(4)->get();
        $items = Product::latest()->take(4)->get();
        return view('frontend.index', compact('users', 'items'));
    }

     // homepage
        public function about(){
            return view ('frontend.pages.about');

        }

    
        public function contact(){
            return view ('frontend.pages.contact');

        }

        public function SubmitInquery(Request $request){
            // return $request;
            $request->validate([
                'name'=>'required',
                'phone'=>'required|min:10|numeric',
                'email'=>'required',
                'subject'=>'required',
                'details'=>'required',
            ]);
            $data = new Inquery();
            $data->name = $request->name ;
            $data->email = $request->email ;
            $data->subject = $request->subject;
            $data->phone = $request-> phone;
            $data->details = $request->details;
            $data->status = "new";
            $data->save();
            return back()->with('success', 'Inquery received');
        }

        public function showInquery(){
            $breadcrum = "Inquery";
            $table = Inquery::orderBy('created_at', 'desc')->paginate(8);
            return view('admin.pages.inquery', compact('table', 'breadcrum'));
        }

        public function markAsRead(Request $request){
            $data = Inquery::findOrFail($request->id);
            if($request->status == "new"){
                $data->status = "read";
            }
            $data->save();
            return back();
        }

        Public function removeInquery($id){
            $data = Inquery::findOrFail($id);
            $data->delete();
            return back()->with('success', 'Inquery has been removed');
        }

    

        
        // public function menu(){
        //     return view ('frontend.pages.menu');

        // }

        public function menu(Product $product)
        {
            $items = Product::where('status',1)->paginate(6);
            return view('frontend.pages.menu',["menu"=>$items]);
        }

        public function userLogin(){
            return view('frontend.pages.login');
        }



        public function Shop($id){
            $data = Product::where('user_id', $id)->get();
            $user = User::find($id);
            return view('frontend.pages.shop', compact('data', 'user'));
        }


}

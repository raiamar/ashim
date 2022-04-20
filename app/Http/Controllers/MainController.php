<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Rating;

class MainController extends Controller
{
    public function ChangeStatus(Request $request, $id){
        $data = Product::findOrFail($id);
        if($request->status == 1){
            $data->status = 1;
        }else{
            $data->status = 0;
        }
        $data->save();
        return back();
    }
    public function dashborad(){
        return view('admin.layout.home');
    }


    public function ChangeRole($id){
        $data = User::findOrFail($id);

        if($data->role == "admin"){
            return back();
        }

        if($data->role == "manager"){
            $data->role = "user";
        }else{
            $data->role = "manager";
        }
        $data->save();
        return back();
    }


    public function DeleteUser($id){
        $data = User::findOrFail($id);
        $data->delete();
        return back();
    }


    public function RateMe($id){
        $menu_id = $id;
        return view('admin.pages.rating', compact('menu_id'));
    }


    public function RateMeSubmit(Request $request){
        $input = $request->except('_token');
        Rating::create($input);
        return back();
    }
       
}

<?php

namespace App\Http\Controllers;

use App\Models\Reg;
use Illuminate\Http\Request;
use Session;
use Crypt;

class RegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexReg()
    {
        return view('frontend.pages.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeReg(Request $req)
    {
        // echo Crypt::encrypt('125!2#');
        // return $request->input();
        $user = new Reg;

        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->mobile=$req->input('mobile');
        $user->address=$req->input('address');
        $user->password=$req->input('password');
        $user->save();
        $req->session()->put('user',$req->input('email'));
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reg  $reg
     * @return \Illuminate\Http\Response
     */
    public function show(Reg $reg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reg  $reg
     * @return \Illuminate\Http\Response
     */
    public function edit(Reg $reg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reg  $reg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reg $reg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reg  $reg
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}

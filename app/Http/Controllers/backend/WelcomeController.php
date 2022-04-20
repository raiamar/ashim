<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){
        return view('Backend.welcome');
    }
    public function login(){
        return view('Backend.login');
    }
}

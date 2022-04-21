<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorRequestController extends Controller
{
    public function become_vendor(Request $request)
    {
        $user = Auth::user();
        $user->update(['vendor_request' => 1]);
        return redirect()->back()->with('message', 'Your request has been successfully send to admin.');
    }
}

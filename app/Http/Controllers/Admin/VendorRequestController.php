<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorRequestController extends Controller
{
    public function index()
    {
        $users = User::where(['vendor_request' => 1])->paginate(10);
        return view('admin.vendor_request.index', compact('users'))->with('id');
    }

    public function makeVendor(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $user->update(['role' => 'vendor']);
        return redirect()->back()->with('success', 'User is now vendor');
    }
}

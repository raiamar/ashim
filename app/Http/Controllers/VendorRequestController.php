<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\VendorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorRequestController extends Controller
{
    public function become_vendor(Request $request)
    {
        $user = Auth::user();
        $user->update(['vendor_request' => 1]);
        $admin = User::where('role', 'admin')->first();
        $notification['admin_name'] = $admin->name;
        $notification['vendor_name'] = $user->name;
        $notification['link'] = route('admin.get_vendor_request');
        $notification['msg'] = $user->name.' '. 'has requested to become a vendor';
        $admin->notify(new VendorRequest($notification));
        return redirect()->back()->with('message', 'Your request has been successfully send to admin.');
    }
}

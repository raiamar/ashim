<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('admin.pages.profile');
    }

    public function storeUserNewPassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(\auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        return redirect()->back()->with('success', 'Password changed successfully');
    }

    public function changeEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
        ]);
        User::find(\auth()->user()->id)->update(['email' => $request->email, 'name' => $request->name]);
        return redirect()->back()->with('success', 'Detail changed successfully');
    }

    public function changeUserImage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png|max:10000',
        ]);
        $user = Auth::user();
        $currentImage = $user->image;
        $image = $request->file('image');
        if ($image != $currentImage) {
            $filePath = 'uploads/avatar/';
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            if (!File::isDirectory($filePath)) {
                File::makeDirectory($filePath, 0777, true);
            }
            $image->move($filePath, $imageName);
            if (file_exists($filePath . $currentImage)) {
                @unlink($filePath . $currentImage);
            }
        } else {
            $imageName = $currentImage;
        }
        $user->image = $imageName;
        $user->save();

        return redirect()->back()->with('success', 'Image changed successfully');
    }
}

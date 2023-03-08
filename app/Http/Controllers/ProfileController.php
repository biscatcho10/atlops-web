<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::where('id', $id)->first();
        return view('profile', compact('user'));
    }

    public function profileUpdate($id)
    {
        //dd($id);
        $user = User::where('id', $id)->first();
        //return $user;
        return view('updateProfile', compact('user'));
    }

    public function saveEditProfile(Request $request)
    {
        //return auth()->user()->photo;
        $id = auth()->user()->id;
        $user = User::find($id);

        //dd($request->photo, $request->hasFile('photo'));

        if ($request->hasFile('photo')) {
            $filename = public_path('Attachments/' . 'user' . auth()->user()->photo);
            if (file_exists($filename)) {
                unlink($filename);
            }
            // $filename = hash_hmac('sha256', hash_hmac('sha256', preg_replace('/\\.[^.\\s]{3,4}$/', '', $request->photo), false), false);
            $image_name = $request->photo->getClientOriginalName();
            $file = $request->photo->move(public_path('Attachments/' . 'user'), $image_name);
            $user->photo = $image_name;
            $user->save();
        }

        $keys = ['firstName', 'lastName', 'email', 'phone', 'type'];
        foreach ($keys as $key) {
            if ($request->hasAny($key)) {
                $user->update([
                    $key => $request->$key
                ]);
            }
        }

        return redirect('home');
    }

    public function changePassword()
    {
        return view('changePassword');
    }

    public function changePasswordDone(Request $request)
    {


        $id = auth()->user()->id;
        $user = User::find($id);

        $password = Auth::user()->password;
        if (Hash::check($request->current_password, $password) && $request->new_password == $request->validate_password) {
            $new_password = Hash::make($request->new_password);
            $user->update([
                'password' => $new_password
            ]);
            return redirect('home');
        } else {
            return redirect('changePassword');
        }
    }
}

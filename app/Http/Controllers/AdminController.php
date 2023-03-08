<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.layouts.layout');
    }

    public function login()
    {
        return view('dashboard.auth.adminLogin');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8|max:25',
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('index')
                ->withSuccess('Signed in');
        }

        return redirect("admin/login")->withSuccess('Login details are not valid');
    }
}

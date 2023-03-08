<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::where('id',$id)->first();
        return view('auth.login',compact('user'));
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }
      
    public function customRegistration(Request $request)
    {  
      // dd($request->all());
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/(05)[0-9]{8}/|max:10|unique:users',
            'date' => 'required',
            'type' => 'required',
            'communication' => 'required',
            'password' => 'required|min:6|max:25',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
       // $user = new User();   
        $data = $request->all();
        $user = $this->create($data);

        if ($request->hasFile('photo')) {
            if ($request->file('photo')->getSize() < (5 * 1024 * 1024)) {
                $filename = hash_hmac('sha256', hash_hmac('sha256', preg_replace('/\\.[^.\\s]{3,4}$/', '', $request->image), false), false);
                $image_name = $request->photo->getClientOriginalName();
                $file = $request->photo->move(public_path('Attachments/' . 'user'), $image_name);
                $user->photo = $image_name;
                $user->save();
            }
        }

    
        return redirect("dashboard")->withSuccess('You have signed-in');
        
    }

    public function create(array $data)
    {
      return User::create([
        'firstName' => $data['firstName'],
        'lastName' => $data['lastName'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'date' => $data['date'],
        'type' => $data['type'],
        'communication' => $data['communication'],
        'password' => Hash::make($data['password']),
        'userDetails'=>$data['userDetails'],
        'photo' =>$data['photo']
      ]);

      
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('home');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Auth::logout();
        return Redirect('login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\product;
use App\Models\User;
use App\Models\order;
use Auth;

class UserController extends Controller
{
    public function register(){
        return  view('register');
    }
    public function login(){
        return view('login');
    }
    public function home(){
        $user = Auth::user();
        $products = product::all();
        return view('home', compact('user','products'));
    }
    public function register_post(Request $request)
    {
     
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); 
    
    
        if ($user->save()) {
            return redirect()->route('login')->with('success', 'Registration completed successfully.');
        } else {
            return redirect()->route('register')->withErrors('Registration failed. Please try again.');
        }
    }
    public function login_post(Request $request)
    {
     
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
   
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
         
            return redirect()->route('home');
        } else {
          
            return redirect()->route('login')->withErrors('Login failed. Please check your credentials and try again.');
        }
    }
    public function order(Request $request)
    {
      
        $order = new Order();
        $order->product_name = $request->input('product_name');
        $order->user_id = $request->input('user_id');
        $order->price = $request->input('price');
    
       $order->image = $request->input('image');
    
        if ($order->save()) {
            return back()->with('success', 'Order placed successfully!');
        }
    
        return back()->with('error', 'Failed to place order.');
    }
    
    
    
}

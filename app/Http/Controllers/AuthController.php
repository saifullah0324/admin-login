<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            if ($user->role === 'admin') {
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('dashboard')
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('user.dashboard')
                ]);
            }
        }
    
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials. Please try again.'
        ], 401);
    }
    

 public function profile()
{
    $user = Auth::user(); 

    if ($user) {
       
        if ($user->role === 'admin') {
            return view('profile', compact('user'));
        }

        
        return view('profile', compact('user'));
    }

   
    return redirect()->route('login.form')->with('error', 'Unauthorized access.');
}

public function updateProfile(Request $request)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . Auth::id(),
    ]);

    
    $user = Auth::user();

    
    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User not authenticated.',
        ], 401);
    }

    
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->save();
   
    

    
    return response()->json([
        'success' => true,
        'message' => 'Profile updated successfully.',
        'user' => $user,
    ]);
}


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}


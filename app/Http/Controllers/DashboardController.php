<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    public function userDashboard()
    {
        $user = Auth::user();
        return view('user.dashboard',compact('user'));
    }
}

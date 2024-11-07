<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin');
    }
    public function showLoginForm(Request $request)
    {
        if ($request->session()->has('id')) {
            return redirect()->route('admin');
        }
        return view('admin.login');
    }

    // Xác thực đầu vào
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        $email = $request->input('email');
        $password = $request->input('password');


        $user = DB::table('users')->select('id', 'email', 'password')->where('email', $email)->first();

       if (!$user) {
           return back()->with('error', 'User not found');
       }
       if($user->password !== $password) {
           return redirect()->back()->with('error', 'Wrong password');
       }

        session(['id' => $user->id]);

       return redirect()->route('admin.dashboard');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('id');

        return redirect()->route('admin.login')->with('success', 'You have successfully logged out');
    }


}

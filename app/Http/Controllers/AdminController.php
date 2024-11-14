<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Hàm hiển thị trang quản trị, kiểm tra đăng nhập trước
    public function index(Request $request)
    {
        // Kiểm tra nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
        if (!$request->session()->has('id')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access the admin page.');
        }

        return view('admin.admin');
    }

    // Hàm hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Hàm xử lý đăng nhập
    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // Kiểm tra người dùng có tồn tại không
        $user = DB::table('users')->select('id', 'email', 'password')->where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'User not found');
        }

        // Kiểm tra mật khẩu
        if ($user->password !== $password) {
            return back()->with('error', 'Wrong password');
        }

        // Lưu session khi đăng nhập thành công
        session(['id' => $user->id]);

        // Chuyển hướng về trang quản trị (admin) thay vì dashboard
        return redirect()->route('admin');
    }

    // Hàm xử lý đăng xuất
    public function logout(Request $request)
    {
        $request->session()->forget('id');
        return redirect()->route('admin.login')->with('success', 'You have successfully logged out');
    }
}

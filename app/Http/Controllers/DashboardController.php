<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Tính tổng số sản phẩm
        $totalProducts = DB::table('product')->count();

        // Tính tổng số danh mục
        $totalCategories = DB::table('category')->count();

        $totalUsers = DB::table('users')->count();

        // Truyền cả hai biến vào view
        return view('dashboard.dashboard', compact('totalProducts', 'totalCategories', 'totalUsers'));
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $total_orders = DB::table('sales')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->where('is_verified', 1)
            ->where('is_otp_verified', 1)
            ->count();
        $total_sales = DB::table('sales')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->where('is_verified', 1)
            ->where('is_otp_verified', 1)
            ->sum('total_amount');
        $total_pending_orders = DB::table('sales')
            ->where('status', 0)
            ->where('is_verified', 1)
            ->where('is_otp_verified', 1)
            ->count();
        $total_products = DB::table('products')
            ->where('is_active', 0)
            ->count();
        $total_out_stock = DB::table('products')
            ->where('is_active', 1)
            ->orWhere('stock', 0)
            ->count();
        $total_users = DB::table('users')
            ->count();
        return view('admin.index', compact(
            'total_orders',
            'total_users',
            'total_products',
            'total_out_stock',
            'total_sales',
            'total_pending_orders'
        ));
    }
}

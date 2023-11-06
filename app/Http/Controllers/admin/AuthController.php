<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function index()
    {
        if (Auth::guard('admin')->check()) {
            return back();
        }
        return view('admin.auth.login');
    }

    function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $userInfo = AdminModel::where('email', '=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('error', 'We do not recognize your email address');
        } else {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('admin')->attempt($credentials)) {
                $userInfo = Auth::guard('admin')->user();
                // dd($userInfo);
                Session::put('LoggedAdmin', $userInfo);
                return redirect('/admin');
            } else {
                return back()->with('error', 'Incorrect password');
            }
        }
    }
    function logout()
    {
        Session::flush();
        Auth::guard('admin')->logout();
        return Redirect('/admin/login');
    }
}

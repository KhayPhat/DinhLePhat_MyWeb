<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function login()
    {
        return view('login');
    }

    // Xử lý đăng nhập
    public function doLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

if (Auth::attempt($credentials, $request->remember)) {

    $request->session()->regenerate();

    return redirect('/admin/dashboard');
}

return back()
    ->with('error', 'Email hoặc mật khẩu không đúng')
    ->withInput();
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $username = $request->inputUsername;
        $password = $request->inputPassword;
        if ($username == 'admin' && $password == '123456') {
            $request->Session()->push('login', true);
            return redirect()->route('show.blog');
        }
        $message = 'Đăng nhập không thành công. Tên người dùng hoặc mật khẩu không đúng.';
        $request->Session()->flash('login-fail', $message);
        return view('login');
    }
}
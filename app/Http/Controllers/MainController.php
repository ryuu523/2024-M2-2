<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function show_login()
    {
        return view("login");
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended("menu");
        }
        return redirect()->route("show_login")->with("error", "メールアドレスまたはパスワードが正しくありません");
    }
    public function menu()
    {
        return view("menu");
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show_login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        $existingUser = User::where('username', $request->username)->first();
        if (Auth::attempt($data)) {
            User::where('id', $existingUser->id)->update(['status' => 'online']);
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Username atau Password Salah')->withInput();
        }
    }

    public function logout()
    {
        $user = Auth::user();
        User::where('id', $user->id)->update(['status' => 'offline']);
        Auth::logout();
        return redirect()->route('login');

    }
}

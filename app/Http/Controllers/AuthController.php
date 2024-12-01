<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'id_staff' => 'required|exists:users,id_staff', // Validasi id_staff
            'password' => 'required|min:8', // Validasi password
        ]);

        $credentials = [
            'id_staff' => $request->id_staff,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['id_staff' => 'ID Staff atau password salah']);
    }

    // Tampilkan form register
    public function registerForm()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'id_staff' => 'required|unique:users',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_staff' => $request->id_staff,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

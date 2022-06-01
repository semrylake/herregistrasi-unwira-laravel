<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->User = new User();
    }
    public function index()
    {
        return view('login', [
            "judul" => "Login",
        ]);
    }

    public function loginprocess(Request $request)
    {
        $validate = $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ]);
        // dd($validate);

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('pesan', 'Selamat datang kembali');
        }
        return redirect('/auth')->with('pesan', 'Proses Login Gagal.');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/auth');
    }
}

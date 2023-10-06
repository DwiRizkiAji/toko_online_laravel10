<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view("sesi/index");
    }

    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'email wajib di isi',
            'password.required' => 'password wajib di isi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            //autentikasi berhasil
            return redirect('siswa')->with('success', Auth::user()->name . 'Berhasil Login');
        } else {
            //autentikasi gagal
            return redirect('sesi')->withErrors('Username dan Password tidak Valid');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil Logout');
    }

    function register()
    {
        return view('sesi/register');
    }

    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'nama wajib di isi',
            'email.required' => 'email wajib di isi',
            'email.email' => 'email tidak valid',
            'email.unique' => 'email sudah terdaftar, masukan email yang lain',
            'password.required' => 'password wajib di isi',
            'password.min' => 'password minimum 6 karakter'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            //autentikasi berhasil
            return redirect('sesi')->with('success', 'Berhasil Register');
        } else {
            //autentikasi gagal
            return redirect('sesi')->withErrors('Username dan Password tidak Valid');
        }
    }
}

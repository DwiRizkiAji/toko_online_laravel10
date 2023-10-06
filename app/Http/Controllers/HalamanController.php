<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function index()
    {
        $judul = "Halaman Index";
        return view('halaman/index')->with('judul', $judul);
    }
    function tentang()
    {
        $judul = "Halaman Tentang";
        return view('halaman/tentang')->with('judul', $judul);
    }
    function kontak()
    {
        $data = [
            'judul' => 'Halaman Kontak',
            'kontak' => [
                'email' => 'domi@gmail.com',
                'fb' => 'domicaem',
                'youtube' => 'domichanel'
            ]
        ];
        return view('halaman/kontak')->with($data);
    }
}

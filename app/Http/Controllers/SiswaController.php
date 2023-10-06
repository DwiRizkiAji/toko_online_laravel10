<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = siswa::all();
        $data = siswa::orderBy('nomor_induk', 'desc')->paginate(5);
        return view('siswa/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nomor_induk', $request->nomor_induk);
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);
        $request->validate([
            'nomor_induk' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png,gif'
        ], [
            'nomor_induk.required' => 'nomor induk wajib di isi',
            'nomor_induk.numeric' => 'nomor induk wajib di isi angka',
            'nama.required' => 'nama wajib di isi',
            'alamat.required' => 'alamat wajib di isi',
            'foto.required' => 'Upload Foto',
            'foto.mimes' => 'ekstensi foto jpg, jpeg, png dan gif'
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('asset/foto'), $foto_nama);
        $data = [
            'nomor_induk' => $request->input('nomor_induk'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'foto' => $foto_nama
        ];
        siswa::create($data);
        return redirect('siswa')->with('success', 'Berhasil Memasukan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return "saya siswa dari controller dengan id $id";

        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required'
        ], [
            'nomor_induk.numeric' => 'nomor induk wajib di isi angka',
            'nama.required' => 'nama wajib di isi',
            'alamat.required' => 'alamat wajib di isi',
        ]);
        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat')
        ];
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpeg,jpg,png,gif'
            ], [
                'foto.mimes' => 'ekstensi foto jpg, jpeg, png dan gif'
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move(public_path('asset/foto'), $foto_nama); //sudah terupload ke directory
            $data_foto = siswa::where('nomor_induk', $id)->first();
            File::delete(public_path('asset/foto') . '/' . $data_foto->foto); //proses menghapus data foto

            $data['foto'] = $foto_nama;
        }
        siswa::where('nomor_induk', $id)->update($data);
        return redirect('/siswa')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = siswa::where('nomor_induk', $id)->first();
        File::delete(public_path('asset/foto') . '/' . $data->foto);
        siswa::where('nomor_induk', $id)->delete();
        return redirect('/siswa')->with('success', 'Berhasil Hapus Data');
    }
}

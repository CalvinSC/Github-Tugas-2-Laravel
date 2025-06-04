<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // panggil model Prodi menggunakan eloquent
        $prodi = Prodi::all(); // perintah SQL setara dengan SELECT * FROM prodi
        //dd($prodi);
        return view('prodi.index')->with('prodi',$prodi); // mengirim data ke view prodi.index
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas =
        Fakultas::all(); // ambil semua data fakultas
        return view('prodi.create', compact('fakultas')); // menampilkan form untuk menambah data prodi
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
        // validasi input
        $input = $request->validate([
            'nama' => 'required|unique:prodi',
            'singkatan' => 'required|max:5',
            'kaprodi' => 'required',
            'Sekretaris' => 'required',
            'fakultas_id' => 'required',
        ]);
        // simpan data ke tabel prodi
        Prodi::create($input);
        // redirect ke halaman fakultas
        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil ditambahkan');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        return view('prodi.show', compact('prodi')); // menampilkan detail prodi
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //dd($prodi);
        $fakultas = Fakultas::all(); // ambil semua data fakultas
        return view('prodi.edit', compact('prodi','fakultas')); // menampilkan form untuk mengedit data prodi
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        // validasi input
        $input = $request->validate([
            'nama' => 'required|unique:prodi,nama,' . $prodi->id,
            'singkatan' => 'required|max:5',
            'kaprodi' => 'required',
            'Sekretaris' => 'required',
            'fakultas_id' => 'required',
        ]);
        // update data prodi
        $prodi->update($input);

        // redirect ke halaman prodi
        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        // hapus data prodi
        $prodi->delete();
        // redirect ke halaman prodi
        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil dihapus');
    }
}

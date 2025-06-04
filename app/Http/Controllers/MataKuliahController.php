<?php

namespace App\Http\Controllers;

use App\Models\mata_kuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // panggil model mata_kuliah menggunakan eloquent
        $mata_kuliah = mata_kuliah::all(); // perintah SQL setara dengan SELECT * FROM mata_kuliah
        //dd($mataKuliah);
        //dd($mata_kuliah);
        return view('mata_kuliah.index', compact('mata_kuliah')); // mengirim data ke view mata_kuliah.index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $prodi =
        Prodi::all(); // ambil semua data prodi
        return view('mata_kuliah.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $input = $request->validate([
            'kode_mk' => 'required|unique:mata_kuliah',
            'nama' => 'required',
            'prodi_id' => 'required|exists:prodi,id',
        ]);

        // Simpan data ke tabel mata_kuliah
        mata_kuliah::create($input);

        // Redirect ke halaman mata_kuliah
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(mata_kuliah $mata_kuliah)
    {
        return view('mata_kuliah.show', compact('mata_kuliah')); // Menampilkan detail mata_kuliah
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mata_kuliah $mata_kuliah)
    {
        return view('mata_kuliah.edit', compact('mata_kuliah')); // Menampilkan form untuk mengedit mata_kuliah
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mata_kuliah $mata_kuliah)
    {
        // Validasi input
        $input = $request->validate([
            'kode_mk' => 'required|unique:mata_kuliah,kode_mk,' . $mata_kuliah->id,
            'nama' => 'required',
            'sks' => 'required|integer',
            'prodi_id' => 'required|exists:prodi,id',
        ]);

        // Update data mata_kuliah
        $mata_kuliah->update($input);

        // Redirect ke halaman mata_kuliah
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mata_kuliah $mata_kuliah)
    {
        // Hapus data mata_kuliah
        $mata_kuliah->delete();

        // Redirect ke halaman mata_kuliah
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil dihapus');
    }
}

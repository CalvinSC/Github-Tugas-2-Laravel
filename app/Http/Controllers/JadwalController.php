<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = jadwal::with(['sesi', 'mataKuliah'])->get(); // Mengambil data jadwal beserta relasi sesi dan mataKuliah
        return view('jadwal.index', compact('jadwal')); // Mengirim data ke view jadwal.index
        // dd($jadwal); // Uncomment this line if you want to debug and see the data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sesi = \App\Models\sesi::all(); // Mengambil semua data sesi
        $mataKuliah = \App\Models\mata_kuliah::all(); // Mengambil semua data mata kuliah
        return view('jadwal.create', compact('sesi', 'mataKuliah')); // Menampilkan form untuk menambah data jadwal
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $input = $request->validate([
            'kode_jadwal' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
            'sesi_id' => 'required|exists:sesi,id',
        ]);

        // Simpan data ke tabel jadwal
        jadwal::create($input);

        // Redirect ke halaman jadwal
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(jadwal $jadwal)
    {
        return view('jadwal.show', compact('jadwal')); // Menampilkan detail jadwal
        // dd($jadwal); // Uncomment this line if you want to debug and see the data
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jadwal $jadwal)
    {
        $sesi = \App\Models\sesi::all(); // Mengambil semua data sesi
        $mataKuliah = \App\Models\mata_kuliah::all(); // Mengambil semua data mata kuliah
        return view('jadwal.edit', compact('jadwal', 'sesi', 'mataKuliah')); // Menampilkan form untuk mengedit jadwal
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jadwal $jadwal)
    {
        // Validasi input
        $input = $request->validate([
            'kode_jadwal' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
            'sesi_id' => 'required|exists:sesi,id',
        ]);

        // Update data jadwal
        $jadwal->update($input);

        // Redirect ke halaman jadwal
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jadwal $jadwal)
    {
        // Hapus data jadwal
        $jadwal->delete();

        // Redirect ke halaman jadwal
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}

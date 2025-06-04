<?php

namespace App\Http\Controllers;

use App\Models\sesi;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sesi = sesi::all();
        return view('sesi.index')->with('sesi',$sesi); // mengirim data ke view sesi.index
        dd($sesi); // Uncomment this line if you want to debug and see the data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $sesi =
        sesi::all(); 
        return view('sesi.create', compact('sesi')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $input = $request->validate([
            'nama' => 'required|unique:sesi',
        ]);
        
        // Simpan data ke tabel sesi
        sesi::create($input);
        
        // Redirect ke halaman sesi
        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(sesi $sesi)
    {
        return view('sesi.show', compact('sesi')); // Menampilkan detail sesi
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sesi $sesi)
    {
        return view('sesi.edit', compact('sesi')); // Menampilkan form untuk mengedit sesi
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sesi $sesi)
    {
        // Validasi input
        $input = $request->validate([
            'nama' => 'required|unique:sesi,nama,' . $sesi->id,
        ]);
        
        // Update data sesi
        $sesi->update($input);
        
        // Redirect ke halaman sesi
        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sesi $sesi)
    {
        // Hapus data sesi
        $sesi->delete();
        
        // Redirect ke halaman sesi
        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil dihapus');
    }
}

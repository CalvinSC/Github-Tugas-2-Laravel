<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model Fakultas menggunakan eloquent
        $fakultas = Fakultas::all(); // perintah SQL setara dengan SELECT * FROM fakultas
        //dd($fakultas); // dump and die, untuk menampilkan data ke layar
         return view('fakultas.index', compact('fakultas')); // mengirim data ke view fakultas.index
        //selain compact, bisa menggunakan with()


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.create'); // menampilkan form untuk menambah data fakultas
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Fakultas::class)) {
            abort(403);
        }
        // validasi input
        $input = $request->validate([
            'nama' => 'required|unique:fakultas',
            'singkatan' => 'required|max:5',
            'dekan' => 'required',
            'wakil_dekan' => 'required',
        ]);
        // simpan data ke tabel fakultas
        Fakultas::create($input);
        // redirect ke halaman fakultas
        return redirect()->route('fakultas.index')->with('success', 'fakultas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show( $fakultas)
    {
        $fakultas = Fakultas::findOrFail($fakultas);
        //dd($fakultas); // dump and die, untuk menampilkan data ke layar
        return view('fakultas.show', compact('fakultas')); // menampilkan detail fakultas
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $fakultas)
    {
        $fakultas = Fakultas::findorFail($fakultas);
        return view('fakultas.edit', compact('fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $fakultas)
    {
        $fakultas = Fakultas::findOrFail($fakultas);

        if ($request->user()->cannot('update', $fakultas)) {
            abort(403);
        }

        

        // validasi input
        $input = $request->validate([
            'nama' => 'required|',
            'singkatan' => 'required|max:5',
            'dekan' => 'required',
            'wakil_dekan' => 'required',
        ]);

        $fakultas->update($input); // update data fakultas

        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request ,$fakultas)
    {
       $fakultas =
       Fakultas::findOrFail($fakultas);
        
        if ($request->user()->cannot('update', $fakultas)) {
            abort(403);
        }

       // Hapus data fakultas
         $fakultas->delete();
         // Redirect ke halaman fakultas.index dengan pesan sukses
            return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil dihapus');
    }
}

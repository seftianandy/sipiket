<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\Guru;
class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MataPelajaran::getMataPelajaranWithGuru();
        $guru = Guru::all();
        return view('content.mapel.index', compact('data', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.mapel.import');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'mata_pelajaran' => 'required|string|max:255',
            'description' => 'required|string',
            'guru_id' => 'required|exists:guru,id',
        ]);

        // Simpan data ke database
        MataPelajaran::create($validatedData);

        // Redirect atau response
        return redirect('/mata-pelajaran')->with('success', 'Mata Pelajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // return view('content.mapel.detil');
        // $data = MataPelajaran::getMataPelajaranWithGuru();
        // return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mataPelajaran = MataPelajaran::findOrFail($id);
        $mataPelajaran->delete();

        return response()->json(['success' => 'Mata Pelajaran berhasil dihapus']);
    }
}

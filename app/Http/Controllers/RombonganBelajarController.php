<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RombonganBelajar;
use App\Models\Guru;
use App\Models\KelasJurusan;
use App\Models\AnggotaRombel;

class RombonganBelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RombonganBelajar::getRombonganBelajar(1);
        $guru = Guru::all();
        $jurusan = KelasJurusan::all();
        return view('content.rombongan-belajar.index', compact('data', 'guru', 'jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('content.rombongan-belajar.import');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'jurusan_id' => 'required|exists:jurusan,id',
            'nama' => 'required|string|max:255',
            'tingkat' => 'required|string',
            'guru_id' => 'required|exists:guru,id',
            'semester_id' => 'required|exists:tahun_ajaran,id',
        ]);

        // Simpan data ke database
        RombonganBelajar::create($validatedData);

        // Redirect atau response
        return redirect('/rombongan-belajar')->with('success', 'Rombongan belajar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $rombel = RombonganBelajar::getRombonganBelajarById(1, $id);
        $anggota_rombel = AnggotaRombel::getAnggotaRombel(1, $id);
        return view('content.rombongan-belajar.anggota-rombel', compact('rombel', 'anggota_rombel'));
        // return $anggota_rombel;
    }

    public function testing(String $id)
    {
        $anggota_rombel = AnggotaRombel::getAnggotaRombel(1, $id);
        return $anggota_rombel;
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
        $rombonganBelajar = RombonganBelajar::findOrFail($id);
        $rombonganBelajar->delete();

        return response()->json(['success' => 'Mata Pelajaran berhasil dihapus']);
    }
}

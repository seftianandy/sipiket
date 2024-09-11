<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalPelajaran;
use App\Models\MataPelajaran;
use App\Models\RombonganBelajar;
use App\Models\Hari;
use App\Models\RuangKelas;
use App\Models\JamPelajaran;

class JadwalPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mata_pelajaran = MataPelajaran::getMataPelajaranWithGuru();
        $rombongan_belajar = RombonganBelajar::all();
        $hari = Hari::all();
        $ruang_kelas = RuangKelas::all();
        $jam_pelajaran = JamPelajaran::orderBy('description', 'ASC')->get();
        $data = JadwalPelajaran::getJadwalWithRelations(1);
        return view('content.jadwal-pelajaran.index', compact('data', 'mata_pelajaran', 'rombongan_belajar', 'hari', 'ruang_kelas', 'jam_pelajaran'));
        // return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('content.jadwal-pelajaran.import');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id',
            'rombongan_belajar_id' => 'required|exists:rombongan_belajar,id',
            'hari_id' => 'required|exists:hari,id',
            'ruang_id' => 'required|exists:ruangan,id',
            'jam_pelajaran_id' => 'required|array', // Array untuk jam_pelajaran_id
            'jam_pelajaran_id.*' => 'exists:jam_pelajaran,id' // Validasi setiap item di dalam array
        ]);

        // Lakukan iterasi untuk setiap jam_pelajaran_id yang dipilih
        foreach ($request->jam_pelajaran_id as $jamPelajaranId) {
            JadwalPelajaran::create([
                'mata_pelajaran_id' => $request->mata_pelajaran_id,
                'rombongan_belajar_id' => $request->rombongan_belajar_id,
                'hari_id' => $request->hari_id,
                'ruang_id' => $request->ruang_id,
                'jam_pelajaran_id' => $jamPelajaranId,
                'semester_id' => 1,
            ]);
            // return $jamPelajaranId;
        }

        return redirect('/jadwal-pelajaran')->with('success', 'Mata Pelajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('content.jadwal-pelajaran.detil');
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
        $jadwalPelajaran = JadwalPelajaran::findOrFail($id);
        $jadwalPelajaran->delete();

        return response()->json(['success' => 'Jadwal Pelajaran berhasil dihapus']);
    }
}

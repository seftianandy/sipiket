<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.absensi.index');
    }

    public function dataabsensi()
    {
        return view('content.absensi.absensi');
    }

    public function datariwayatabsensi()
    {
        return view('content.absensi.riwayat');
    }

    public function datatigahari()
    {
        return view('content.absensi.tigahari');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.absensi.import');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('content.absensi.detil');
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
        //
    }
}

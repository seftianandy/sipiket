<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesertaDidik;

class PdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PesertaDidik::all();
        return view('content.pd.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.pd.import');
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
        return view('content.pd.detil');
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

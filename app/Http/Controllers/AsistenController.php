<?php

namespace App\Http\Controllers;

use App\Models\Asisten;
use App\Models\Praktikum;
use App\Models\User;
use Illuminate\Http\Request;

class AsistenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asisten = Asisten::with('has_praktikum')->get();
        return view('asisten.index', compact('asisten'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $praktikum = Praktikum::all();
        $idusers = User::select('id', 'name')->get();;
        return view('asisten.create', compact('praktikum', 'idusers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'NRP' => 'required|string|max:9|unique:mahasiswa,NRP',
            'id_praktikum' => 'required|string|max:6',
            'id_user' => 'required|integer',
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'gender' => 'required|in:P,W',
            'no_telp' => 'required|string|max:15',
            'angkatan' => 'required|string|max:4',
            'total_sks' => 'required|integer',
            'jurusan' => 'required|string|max:50',
            'semester' => 'required|string|max:50',
        ]);

        Asisten::create($validatedData);

        return redirect()->route('asisten')->with('status', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

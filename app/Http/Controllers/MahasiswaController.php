<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mhsw = Mahasiswa::all();
        return view('mahasiswa.index', compact('mhsw'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'NRP' => 'required|string|max:9|unique:mahasiswa,NRP',
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'gender' => 'required|in:P,W',
            'no_telp' => 'required|string|max:15',
            'angkatan' => 'required|string|max:4',
            'total_sks' => 'required|integer',
            'jurusan' => 'required|string|max:50',
            'semester' => 'required|string|max:50',
        ]);

        Mahasiswa::create($validatedData);

        return redirect()->route('mahasiswa')->with('status', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mhsw = Mahasiswa::find($id);

        if (!$mhsw) {
            return response()->json(['message' => 'Mata Kuliah not found'], 404);
        }
        return response()->json($mhsw);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mhsw = Mahasiswa::find($id);

        if (!$mhsw) {
            return redirect()->route('mahasiswa.index')->with('error', 'Mahasiswa not found');
        }

        return view('mahasiswa.edit', compact('mhsw'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'gender' => 'required|in:P,W',
            'no_telp' => 'required|string|max:15',
            'angkatan' => 'required|string|max:4',
            'total_sks' => 'required|integer',
            'jurusan' => 'required|string|max:50',
            'semester' => 'required|string|max:50',
        ]);

        $mhsw = Mahasiswa::find($id);

        if (!$mhsw) {
            return redirect()->route('mahasiswa.index')->with('error', 'Mahasiswa not found');
        }

        $mhsw->update($validatedData);

        return redirect()->route('mahasiswa')->with('status', 'Data mahasiswa berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mhsw = Mahasiswa::find($id);

        if (!$mhsw) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        $mhsw->delete();
        return redirect()->route('mahasiswa');
    }
}
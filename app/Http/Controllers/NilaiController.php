<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Praktikum;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilai = Nilai::with('has_praktikum', 'has_mahasiswa')->get();
        return view('nilai.index', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $praktikum = Praktikum::all('id_praktikum');
        $mhsw = Mahasiswa::all();

        return view('nilai.create', compact('praktikum', 'mhsw'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nilai = $request->input('nilai');

        if ($nilai >= 80) {
            $request->merge(['predikat' => 'A']);
        } else if ($nilai >= 70) {
            $request->merge(['predikat' => 'B']);
        } else if ($nilai >= 60) {
            $request->merge(['predikat' => 'C']);
        } else if ($nilai >= 40) {
            $request->merge(['predikat' => 'D']);
        } else {
            $request->merge(['predikat' => 'E']);
        }

        $validatedData = $request->validate([
            'id_praktikum' => 'required|string|max:6',
            'NRP' => 'required|string|max:9',
            'predikat' => 'required|string|max:1',
            'nilai' => 'required|integer',
        ]);

        Nilai::create($validatedData);

        return redirect()->route('nilai')->with('status', 'Data nilai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nilai = Nilai::find($id);

        if (!$nilai) {
            return response()->json(['message' => 'Nilai not found'], 404);
        }
        return response()->json($nilai);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nilai = Nilai::find($id);

        if (!$nilai) {
            return redirect()->route('nilai')->with('error', 'Nilai not found');
        }

        $mhsw = Mahasiswa::all();
        $praktikum = Praktikum::all('id_praktikum');

        return view('nilai.edit', compact('praktikum', 'nilai', 'mhsw'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nilai = $request->input('nilai');

        if ($nilai >= 80) {
            $request->merge(['predikat' => 'A']);
        } else if ($nilai >= 70) {
            $request->merge(['predikat' => 'B']);
        } else if ($nilai >= 60) {
            $request->merge(['predikat' => 'C']);
        } else if ($nilai >= 40) {
            $request->merge(['predikat' => 'D']);
        } else {
            $request->merge(['predikat' => 'E']);
        }

        $validatedData = $request->validate([
            'predikat' => 'required|string|max:1',
            'nilai' => 'required|integer',
        ]);

        $nilai = Nilai::find($id);

        if (!$nilai) {
            return redirect()->route('nilai')->with('error', 'nilai not found');
        }

        $nilai->update($validatedData);

        return redirect()->route('nilai')->with('status', 'Data nilai berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nilai = Nilai::find($id);

        if (!$nilai) {
            return redirect()->route('nilai')->with('status', 'Data nilai not found.');
        }

        $nilai->delete();
        return redirect()->route('nilai');
    }
}

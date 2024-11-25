<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;
use Illuminate\Database\QueryException;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mk = MataKuliah::all();
        return view('mk.index', compact('mk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_matkul' => 'required|string|max:6|unique:mata_kuliah,id_matkul',
            'semester' => 'required|string|max:1',
            'fakultas' => 'required|string|max:50',
            'nama' => 'required|string|max:50',
            'sks' => 'required|integer',
        ]);

        MataKuliah::create($validatedData);

        return redirect()->route('mk')->with('status', 'Data ruang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mk = MataKuliah::find($id);

        if (!$mk) {
            return redirect()->route('mk.index')->with('error', 'Mata Kuliah not found');
        }
        return response()->json($mk);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mk = MataKuliah::select(
            'id_matkul', 'semester', 'fakultas', 'nama', 'sks'
        )->find($id);

        if (!$mk) {
            return redirect()->route('mk.index')->with('error', 'Mata Kuliah not found');
        }

        return view('mk.edit', compact('mk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'semester' => 'required|string|max:1',
            'fakultas' => 'required|string|max:50',
            'nama' => 'required|string|max:50',
            'sks' => 'required|integer',
        ]);

        $mk = MataKuliah::find($id);

        if (!$mk) {
            return redirect()->route('mk.index')->with('error', 'Mata Kuliah not found');
        }

        $mk->update($validatedData);

        return redirect()->route('mk')->with('status', 'Data Mata Kuliah berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mk = MataKuliah::find($id);

        if (!$mk) {
            return response()->json(['message' => 'Mata Kuliah not found'], 404);
        }

        try {
            $mk->delete();
        } catch (QueryException $e) {
            return back()->withErrors(
                ['error' => 'Gagal menghapus, masih terdapat data praktikum yang terkait dengan data ini. Coba lagi.']
            );
        }
        return redirect()->route('mk');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;
use Illuminate\Database\QueryException;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruang = Ruang::all();
        return view('ruang.index', compact('ruang'));
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
        $validateData = $request->validate([
            'id_ruang' => 'required|string|max:6|unique:ruang,id_ruang',
            'lokasi' => 'required|string|max:15',
            'tipe' => 'required|in:lab,kelas',
            'kapasitas' => 'required|integer',
        ]);

        Ruang::create($validateData);

        return redirect()->route('ruang')->with('status', 'Data ruang berhasil ditambahkan.');
        // return response()->json([
        //     'message' => 'Ruang created successfully',
        //     'data' => $ruang
        // ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ruang = Ruang::find($id);

        if (!$ruang) {
            return response()->json(['message' => 'Ruang not found'], 404);
        }
        return response()->json($ruang);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ruang = Ruang::select(
            'id_ruang',
            'lokasi',
            'tipe',
            'kapasitas'
        )->find($id);

        if (!$ruang) {
            return redirect()->route('ruang.index')->with('error', 'Ruang not found');
        }

        return view('ruang.edit', compact('ruang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'lokasi' => 'required|string|max:15',
            'tipe' => 'required|in:lab,kelas',
            'kapasitas' => 'required|integer'
        ]);

        $ruang = Ruang::find($id);

        if (!$ruang) {
            return redirect()->route('ruang.index')->with('error', 'Ruang not found');
        }

        $ruang->update($validatedData);

        return redirect()->route('ruang')->with('status', 'Data ruang berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruang = Ruang::find($id);

        if (!$ruang) {
            return response()->json(['message' => 'Ruang not found'], 404);
        }

        try {
            $ruang->delete();
        } catch (QueryException $e) {
            return back()->withErrors(
                ['error' => 'Gagal menghapus, masih terdapat data jadwal yang terkait dengan data ini. Coba lagi.']
            );
        }
        return redirect()->route('ruang');
        // return response()->json(['message' => 'Ruang deleted successfully']);
    }
}

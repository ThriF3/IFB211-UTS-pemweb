<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Praktikum;
use Illuminate\Http\Request;
use App\Models\PesertaPraktikum;

class PesertaPraktikumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peserta = PesertaPraktikum::all();
        return response()->json($peserta);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $praktikum = Praktikum::all();
        $mhsw = Mahasiswa::all();

        return view('praktikum.peserta.create', compact('praktikum', 'mhsw'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_praktikum' => 'required|string|max:6',
            'NRP' => 'required|string|max:9',
        ]);

        $peserta = PesertaPraktikum::create($validatedData);

        return redirect()->route('praktikum.show', $peserta['id_praktikum'])->with('status', 'Data praktikum berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peserta = PesertaPraktikum::with('has_praktikum', 'has_mahasiswa')->find($id);

        if (!$peserta) {
            return response()->json(['message' => 'Peserta Praktikum not found'], 404);
        }
        return response()->json($peserta);
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
        $validatedData = $request->validate([
            'id_praktikum' => 'required|string|max:6',
            'NRP' => 'required|string|max:9',
        ]);

        $peserta = PesertaPraktikum::find($id);

        if (!$peserta) {
            return response()->json(['message' => 'Peserta Praktikum not found'], 404);
        }

        return response()->json([
            'message' => 'Peserta Praktikum Updated Successfully',
            'data' => $peserta
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peserta = PesertaPraktikum::find($id);

        if (!$peserta) {
            return response()->json(['message' => 'Peserta Praktikum not found'], 404);
        }
        
        $peserta->delete();
        return redirect()->back();
    }
}

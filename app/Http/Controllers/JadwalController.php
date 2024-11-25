<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Praktikum;
use App\Models\Ruang;
use Illuminate\Database\QueryException;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::with('has_praktikum', 'has_ruang')->get();
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $praktikum = Praktikum::all('id_praktikum');
        $ruang = Ruang::all('id_ruang');

        return view('jadwal.create', compact('praktikum', 'ruang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_jadwal' => 'required|string|max:6|unique:jadwal,id_jadwal',
            'id_praktikum' => 'required|string|max:6',
            'id_ruang' => 'required|string|max:6',
            'hari' => 'required|string|max:50',
            'waktu' => 'required|date_format:H:i:s',
        ]);

        Jadwal::create($validatedData);

        return redirect()->route('jadwal')->with('status', 'Data jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            return response()->json(['message' => 'Jadwal not found'], 404);
        }
        return response()->json($jadwal);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            return redirect()->route('jadwal')->with('error', 'Jadwal not found');
        }

        $praktikum = Praktikum::all('id_praktikum');
        $ruang = Ruang::all('id_ruang');

        return view('jadwal.edit', compact('jadwal', 'praktikum', 'ruang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'id_praktikum' => 'required|string|max:6',
            'id_ruang' => 'required|string|max:6',
            'hari' => 'required|string|max:50',
            'waktu' => 'required|date_format:H:i:s',
        ]);

        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            return response()->json(['message' => 'Jadwal not found'], 404);
        }

        $jadwal->update($validatedData);

        return redirect()->route('jadwal')->with('status', 'Data jadwal berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            return response()->json(['message' => 'Jadwal not found'], 404);
        }

        try {
            $jadwal->delete();
        } catch (QueryException $e) {
            return back()->withErrors(
                ['error' => 'Gagal menghapus, masih terdapat data jadwal yang terkait dengan data ini. Coba lagi.']
            );
        }
        return redirect()->route('jadwal');
    }
}

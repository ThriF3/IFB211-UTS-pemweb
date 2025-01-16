<?php

namespace App\Http\Controllers;

use App\Models\Asisten;
use App\Models\Mahasiswa;
use App\Models\Praktikum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $user = User::create([
            'name' => $request->nama,
            'role' => 'asisten',
            'email' => $request->email,
            'password' => Hash::make($request->NRP),
        ]);

        Asisten::create([
            'NRP' => $request->NRP,
            'id_praktikum' => $request->id_praktikum,
            'id_user' => $user->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
            'no_telp' => $request->no_telp,
            'angkatan' => $request->angkatan,
            'total_sks' => $request->total_sks,
            'jurusan' => $request->jurusan,
            'semester' => $request->semester,
        ]);

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
        $asisten = Asisten::find($id);

        if (!$asisten) {
            return redirect()->route('mahasiswa.index')->with('error', 'Mahasiswa not found');
        }

        return view('asisten.edit', compact('asisten'));
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

        $asisten = Asisten::find($id);

        if (!$asisten) {
            return redirect()->route('mahasiswa.index')->with('error', 'Asisten not found');
        }

        $asisten->update($validatedData);
        return redirect()->route('asisten')->with('status', 'Data asisten berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mhsw = Asisten::find($id);
        $user = User::find($mhsw->id_user);

        if (!$mhsw) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        $mhsw->delete();
        $user->delete();
        return redirect()->route('asisten');
    }
}

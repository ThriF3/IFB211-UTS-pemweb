<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Praktikum;
use Illuminate\Http\Request;

class PraktikumDetailController extends Controller
{
    public function create_nilai($id)
    {

        $praktikum = Praktikum::all('id_praktikum');
        $mhsw = Mahasiswa::all();

        return view('praktikum.nilai.create', compact('praktikum', 'mhsw', 'id'));
    }

    public function store_nilai(Request $request)
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

        return redirect()->route('praktikum.show', $request->input('id_praktikum'))->with('status', 'Data nilai berhasil ditambahkan.');
    }

    public function destroy_nilai(string $id)
    {
        $nilai = Nilai::find($id);

        if (!$nilai) {
            return redirect()->route('nilai')->with('status', 'Data nilai not found.');
        }

        $id_praktikum = $nilai->id_praktikum;

        $nilai->delete();
        return redirect()->route('praktikum.show', $id_praktikum);
    }
}

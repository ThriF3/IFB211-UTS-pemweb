<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Nilai;
use App\Models\PesertaPraktikum;
use App\Models\Postingan;
use Illuminate\Http\Request;
use App\Models\Praktikum;
use Illuminate\Database\QueryException;

class PraktikumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $praktikum = Praktikum::with('has_matkul')->get();
        return view('praktikum.index', compact('praktikum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mk = MataKuliah::all();

        if (!$mk) {
            return redirect()->route('praktikum.index')->with('error', 'Praktikum not found');
        }

        return view('praktikum.create', compact('mk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_praktikum' => 'required|string|max:5|unique:praktikum,id_praktikum',
            'id_matkul' => 'required|string|max:6|exists:mata_kuliah,id_matkul',
            'kelas' => 'required|string|max:50'
        ]);

        Praktikum::create($validatedData);

        return redirect()->route('praktikum')->with('status', 'Data praktikum berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, string $section = null)
    {
        $praktikum = Praktikum::with('has_matkul', 'has_jadwal', 'has_posting')->find($id);
        if (!$praktikum) {
            return redirect()->route('praktikum.index')->with('error', 'Praktikum not found');
        }

        $praktikum_peserta = PesertaPraktikum::with('has_mahasiswa')
            ->where('id_praktikum', $id)
            ->get();
        $nilai = Nilai::with('has_mahasiswa')
            ->where('id_praktikum', $id)
            ->get();
        $posting = $praktikum->has_posting;

        switch ($section) {
            case 'post':
            return view('praktikum.detail', compact('praktikum', 'praktikum_peserta', 'nilai'))
                ->with('view', view('praktikum.detail.post', compact('praktikum', 'praktikum_peserta', 'posting'))->render());
            case 'peserta':
            return view('praktikum.detail', compact('praktikum', 'praktikum_peserta', 'nilai'))
                ->with('view', view('praktikum.detail.peserta', compact('praktikum', 'praktikum_peserta'))->render());
            case 'nilai':
            return view('praktikum.detail', compact('praktikum', 'praktikum_peserta', 'nilai'))
                ->with('view', view('praktikum.detail.nilai', compact('praktikum', 'nilai'))->render());
            default:
            return view('praktikum.detail', compact('praktikum', 'praktikum_peserta', 'nilai'))
                ->with('view', view('praktikum.detail.post', compact('praktikum', 'praktikum_peserta', 'posting'))->render());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $praktikum = Praktikum::select(
            'id_praktikum',
            'id_matkul',
            'kelas'
        )->find($id);

        if (!$praktikum) {
            return redirect()->route('praktikum.index')->with('error', 'Praktikum not found');
        }

        $mk = MataKuliah::all();

        if (!$mk) {
            return redirect()->route('praktikum.index')->with('error', 'Praktikum not found');
        }

        return view('praktikum.edit', compact('praktikum', 'mk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'id_matkul' => 'required|string|max:6',
            'kelas' => 'required|string|max:50',
        ]);

        $praktikum = Praktikum::find($id);

        if (!$praktikum) {
            return response()->json(['message' => 'Praktikum not found'], 404);
        }

        $praktikum->update($validatedData);

        return redirect()->route('praktikum')->with('status', 'Data praktikum berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $praktikum = Praktikum::find($id);

        if (!$praktikum) {
            return redirect()->route('praktikum.index')->with('error', 'Praktikum not found');
        }

        try {
            $praktikum->delete();
        } catch (QueryException $e) {
            return back()->withErrors(
                ['error' => 'Gagal menghapus, masih terdapat data peserta. Coba lagi.']
            );
        }
        return redirect()->route('praktikum');
    }
}

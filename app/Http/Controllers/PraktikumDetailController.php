<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Praktikum;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PraktikumDetailController extends Controller
{
    public function create_nilai($id)
    {
        $praktikum = Praktikum::with('has_matkul', 'has_peserta', 'has_posting')->find($id);
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
            'id_post' => 'required|integer',
            'NRP' => 'required|string|max:9',
            'predikat' => 'nullable|string|max:1',
            'nilai' => 'nullable|integer',
            'file_content' => 'required|file|mimes:pdf|max:5120',
        ]);

        $filePath = $request->file('file_content')->store('penugasan', 'public');

        Nilai::create([
            'id_praktikum' => $request->id_praktikum,
            'id_post' => $request->id_post,
            'NRP' => $request->NRP,
            'predikat' => $request->predikat,
            'nilai' => $request->nilai,
            'file_content' => $filePath,
        ]);

        return redirect()->route('praktikum.show', [$request->input('id_praktikum'), 'nilai'])->with('status', 'Data nilai berhasil ditambahkan.');
    }

    public function edit_nilai($id)
    {
        $nilai = Nilai::find($id);
        $praktikum = Praktikum::with('has_matkul', 'has_peserta', 'has_posting')->find($nilai->id_praktikum);

        return view('praktikum.nilai.edit', compact('nilai', 'praktikum'));
    }

    public function update_nilai(Request $request, $id)
    {
        $nilai = Nilai::find($id);

        if (!$nilai) {
            return redirect()->route('nilai')->with('status', 'Data nilai not found.');
        }

        $validatedData = $request->validate([
            'predikat' => 'nullable|string|max:1',
            'nilai' => 'nullable|integer',
            'file_content' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $nilai_int = $request->input('nilai');
        if ($nilai_int >= 80) {
            $request->merge(['predikat' => 'A']);
        } else if ($nilai_int >= 70) {
            $request->merge(['predikat' => 'B']);
        } else if ($nilai_int >= 60) {
            $request->merge(['predikat' => 'C']);
        } else if ($nilai_int >= 40) {
            $request->merge(['predikat' => 'D']);
        } else {
            $request->merge(['predikat' => 'E']);
        }

        $filePath = '';
        if ($request->hasFile('file_content')) {
            $filePath = $request->file('file_content')->store('penugasan', 'public');
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($nilai->file_content);
            }
        } else {
            $filePath = $nilai->file_content;
        }

        $nilai->update([
            'predikat' => $request->predikat,
            'nilai' => $request->nilai,
            'file_content' => $filePath,
        ]);
        // return redirect()->route('praktikum.show', [$nilai->id_praktikum, 'nilai'])->with('status', 'Data nilai berhasil diperbarui.');
        return redirect()->back()->with('status', 'Data nilai berhasil diperbarui.');
    }

    public function destroy_nilai(string $id)
    {
        $nilai = Nilai::find($id);

        if (!$nilai) {
            return redirect()->route('nilai')->with('status', 'Data nilai not found.');
        }

        $filePath = $nilai['file_content'];

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

        $id_praktikum = $nilai->id_praktikum;

        $nilai->delete();
        try {
            $nilai->delete();
        } catch (QueryException $e) {
            return back()->withErrors(
                ['error' => 'Gagal menghapus, masih terdapat data peserta. Coba lagi.']
            );
        }
        return redirect()->route('praktikum.show', [$id_praktikum, 'nilai']);
    }

    /**
     * Download penugasan uploaded .pdf file.
     */
    public function download_nilai($id)
    {
        $postingan = Nilai::find($id);
        $url = Storage::path('/public/'.$postingan->file_content);
        return response()->download($url);
    }
}

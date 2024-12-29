<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Praktikum;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class PostinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Index dari controller PraktikumController
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id_praktikum)
    {
        $praktikum = Praktikum::find($id_praktikum);
        return view('postingan.create', compact('praktikum'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_praktikum' => 'required|string|max:6',
            'judul' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'tipe' => 'required|in:modul,penugasan',
            'startDate' => 'required|date',
            'endDate' => 'nullable|date',
            'file_content' => 'required|file|mimes:pdf|max:5120',
        ]);

        $filePath = $request->file('file_content')->store('uploads', 'public');

        Postingan::create([
            'id_praktikum' => $request->id_praktikum,
            'judul' => $request->judul,
            'description' => $request->description,
            'tipe' => $request->tipe,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'file_content' => $filePath,
        ]);

        return redirect()->back()->with('status', 'Data praktikum berhasil ditambahkan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $postingan = Postingan::find($id);

        if (!$postingan) {
            return redirect()->route('praktikum.index')->with('error', 'Postingan not found');
        }

        $filePath = $postingan['file_content'];

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

        try {
            $postingan->delete();
        } catch (QueryException $e) {
            return back()->withErrors(
                ['error' => 'Gagal menghapus, masih terdapat data peserta. Coba lagi.']
            );
        }

        return redirect()->back()->with('status', 'Data praktikum berhasil ditambahkan.');
    }

    /**
     * Download uploaded .pdf file.
     */
    public function download($id)
    {
        $postingan = Postingan::find($id);
        $url = Storage::path('/public/'.$postingan->file_content);
        return response()->download($url);
    }
}

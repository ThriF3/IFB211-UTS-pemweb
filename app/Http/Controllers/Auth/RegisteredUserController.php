<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Asisten;
use App\Models\Praktikum;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function create_asisten(): View
    {
        $praktikum = Praktikum::all();
        return view('auth.register-asisten', compact('praktikum'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => 'required|in:admin,asisten,mahasiswa',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Handle an registrasi pengguna asisten
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store_asisten(Request $request): RedirectResponse
    {
        $request->validate([
            // User Registration
            'name' => ['required', 'string', 'max:255'],
            'role' => 'required|in:admin,asisten,mahasiswa',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // Insert to asisten
            'NRP' => 'required|string|max:9|unique:mahasiswa,NRP',
            'id_praktikum' => 'required|string|max:6',
            'alamat' => 'required|string|max:255',
            'gender' => 'required|in:P,W',
            'no_telp' => 'required|string|max:15',
            'angkatan' => 'required|string|max:4',
            'total_sks' => 'required|integer',
            'jurusan' => 'required|string|max:50',
            'semester' => 'required|string|max:50',
        ]);

        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Asisten::create([
            'NRP' => $request->NRP,
            'id_praktikum' => $request->id_praktikum,
            'id_user' => $user->id,
            'nama' => $request->name,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
            'no_telp' => $request->no_telp,
            'angkatan' => $request->angkatan,
            'total_sks' => $request->total_sks,
            'jurusan' => $request->jurusan,
            'semester' => $request->semester,
        ]);
        event(new Registered($user));

        Auth::login($user);


        return redirect(RouteServiceProvider::HOME);
    }
}

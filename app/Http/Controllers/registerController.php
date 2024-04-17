<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan Anda telah membuat model User ini
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class registerController extends Controller


{
    public function register(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'namaLengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Membuat user baru
        $user = User::create([
            'namaLengkap' => $request->input('namaLengkap'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Log user in setelah registrasi berhasil
        Auth::login($user);

        // Redirect ke halaman home dengan pesan sukses
        return redirect()->route('home')->with('success', 'Registrasi berhasil!');
    }
}

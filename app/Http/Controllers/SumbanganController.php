<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Sumbangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SumbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the current logged-in user's ID
        $userId = Auth::id();

        // Eager load the related 'Buku' model and filter donations by the logged-in user
        $sumbanganItems = Sumbangan::where('id', $userId)->get();

        return view('user.sumbangan', compact('sumbanganItems'));
    }

    public function create()
    {
        $categories = Kategori::all();
        return view('user.form_sumbangan', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'judulBuku' => 'required|string|max:255',
            'bahasa' => 'required|string|max:255',
            'kategori' => 'required|exists:kategori,idKategori',
        ]);

        // Mengambil ID user yang sedang login
        $userId = Auth::id();

        // Buat instance baru dari model Sumbangan
        $sumbangan = new Sumbangan();
        $sumbangan->judulBuku = $request->judulBuku;
        $sumbangan->bahasa = $request->bahasa;
        $sumbangan->idKategori = $request->kategori;
        $sumbangan->id = $userId; // Pastikan ini sesuai dengan skema tabel

        // Simpan data sumbangan ke database
        $sumbangan->save();

        // Kembalikan ke halaman sebelumnya atau halaman tertentu
        return redirect()->route('user.sumbangan')->with('success', 'Sumbangan berhasil ditambahkan.');
    }
}

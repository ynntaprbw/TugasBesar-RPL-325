<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
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
        $sumbanganItems = Sumbangan::with('buku')->where('id', $userId)->get();

        return view('user.sumbangan', compact('sumbanganItems'));
    }

    public function create()
    {
        return view('user.form_sumbangan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judulBuku' => 'required|string|max:255',
            'isbn' => 'required|string|max:13',
            'jumlah_buku' => 'required|integer',
            'tanggalPenyerahan' => 'required|date',
        ]);

        // Check if the book already exists in the 'buku' table
        $buku = Buku::where('isbn', $request->isbn)->first();

        if (!$buku) {
            // If the book does not exist, create a new book entry
            $buku = Buku::create([
                'judulBuku' => $request->judulBuku,
                'isbn' => $request->isbn,
            ]);
        }

        // Add the donation details to the 'sumbangan' table
        Sumbangan::create([
            'idBuku' => $buku->idBuku,
            'id' => auth()->id(),
            'jumlah_buku' => $request->jumlah_buku,
            'tanggalSumbangan' => now(),
            'tanggalPenyerahan' => $request->tanggalPenyerahan,
        ]);

        return redirect()->route('sumbangan')->with('success', 'Sumbangan berhasil ditambahkan.');
    }
}

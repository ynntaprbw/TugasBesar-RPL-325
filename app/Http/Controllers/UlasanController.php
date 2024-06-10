<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\Buku;
use App\Models\Kategori;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{

    public function filterByRating(Request $request)
    {
        // Retrieve the search keyword from the request
        $keyword = $request->input('keyword');

        // Check if the keyword is numeric
        if (is_numeric($keyword)) {
            // If numeric, assume it's a rating
            $ulasans = Ulasan::where('rating', '>=', $keyword)->get();
        } else {
            // Otherwise, assume it's a judul or kategori
            // Filter reviews by judul or kategori
            $ulasans = Ulasan::whereHas('buku', function ($query) use ($keyword) {
                $query->where('judulBuku', 'like', '%' . $keyword . '%')
                    ->orWhereHas('kategori', function ($query) use ($keyword) {
                        $query->where('namaKategori', $keyword);
                    });
            })->get();
        }

        // Return the filtered reviews as JSON response
        return response()->json($ulasans);
    }

    public function store(Request $request, $idBuku)
    {
        // Validate the request data
        $request->validate([
            'komentar' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Create a new review
        $ulasan = new Ulasan();
        $ulasan->idBuku = $idBuku;
        $ulasan->id = Auth::id(); // Assume user is logged in and we have user ID
        $ulasan->komentar = $request->input('komentar');
        $ulasan->rating = $request->input('rating');
        $ulasan->tanggalUlasan = now();
        $ulasan->save();

        // Redirect back to the book detail page
        return redirect()->route('detailBuku', ['idBuku' => $idBuku])->with('success', 'Ulasan berhasil ditambahkan.');
        }
    }


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\Buku;
use App\Models\Kategori;

class ListUlasanController extends Controller
{
    public function index()
    {
        // Retrieve all reviews
        // Retrieve all reviews with associated book information
        $ulasans = Ulasan::join('buku', 'ulasan.idBuku', '=', 'buku.idBuku')
                     ->join('customers', 'ulasan.id', '=', 'customers.id')
                     ->select('ulasan.*', 'buku.judulBuku as judulBuku', 'customers.namaLengkap as namaLengkap')
                     ->get();

        // return response()->json($ulasans);
        return view('user.ulasan')->with('ulasans', $ulasans);
    }

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

    public function storeUlasan(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id' => 'required|exists:customers,id',
            'idBuku' => 'required|exists:buku,idBuku',
            'rating' => 'required|numeric|min:0|max:10',
            'komentar' => 'required|string',
            'tanggalUlasan' => 'required|date',
        ]);

        // Create a new review instance
        $ulasan = new Ulasan();
        $ulasan->id = $request->input('id');
        $ulasan->idBuku = $request->input('idBuku');
        $ulasan->rating = $request->input('rating');
        $ulasan->komentar = $request->input('komentar');
        $ulasan->tanggalUlasan = $request->input('tanggalUlasan');

        // Save the review
        $ulasan->save();

        // Return the newly created review as JSON response
        return response()->json($ulasan, 201);
    }
}

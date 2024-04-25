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
                     ->join('users', 'ulasan.idUser', '=', 'users.idUser')
                     ->select('ulasan.*', 'buku.judulBuku as judulBuku', 'users.namaLengkap as namaLengkap')
                     ->get();
        
        // return response()->json($ulasans);
        return view('user.ulasan')->with('ulasans', $ulasans);
    }

    public function filterByRating(Request $request)
    {
        // Retrieve the 'rating' parameter from the request
        $rating = $request->input('rating');

        // Filter reviews by rating
        $ulasans = Ulasan::where('rating', '>=', $rating)->get();
        
        // Return the filtered reviews as JSON response
        return response()->json($ulasans);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'idUser' => 'required|exists:users,id',
            'idBuku' => 'required|exists:buku,idBuku',
            'rating' => 'required|numeric|min:0|max:10',
            'komentar' => 'required|string',
            'tanggalUlasan' => 'required|date',
            // Add more validation rules as needed
        ]);

        // Create a new review instance
        $ulasan = new Ulasan();
        $ulasan->idUser = $request->input('idUser');
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

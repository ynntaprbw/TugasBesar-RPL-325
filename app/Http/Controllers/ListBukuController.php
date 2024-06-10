<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ListBukuController extends Controller
{
    public function create()
    {
        // Retrieve all books
        $bukus = Buku::all();

        // Return the books as JSON response
        return view('user.beranda')->with('bukus', $bukus);

    }

    public function filterBuku(Request $request)
    {
        // Retrieve the search keyword from the request
        $keyword = $request->input('keyword');

        // Check if the keyword matches any category name
        $kategoriId = Kategori::where('namaKategori', $keyword)->value('idKategori');

        // Search based on the keyword
        $bukus = Buku::query();
        if ($kategoriId) {
            // If the keyword matches a category, filter books by category
            $bukus->where('idKategori', $kategoriId);
        } else {
            // Otherwise, filter books by title
            $bukus->where('judulBuku', 'like', '%' . $keyword . '%');
        }

        // Retrieve the filtered books
        $filteredBukus = $bukus->get();

        // Return the filtered books as JSON response
        return response()->json($filteredBukus);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $bukus = Buku::where('judulBuku', 'LIKE', "%{$keyword}%")->get();
        return view('user.beranda', compact('bukus'));
    }

    public function kategori()
{
    return $this->belongsTo(Kategori::class, 'idKategori');
}

public function getById($id)
{
    // Fetch the book details with its category
    $buku = Buku::with('kategori')->find($id);
    
    if ($buku) {
        // Fetch reviews specific to this book and join with users table to get user names
        $ulasans = Ulasan::where('idBuku', $id)
                         ->join('users', 'ulasan.id', '=', 'users.id')
                         ->select('ulasan.*', 'users.name as name')
                         ->get();

        // Return the view with the book and its reviews
        return view('user.detailBuku', compact('buku', 'ulasans'));
    } else {
        // Return a JSON response if the book is not found
        return response()->json(['message' => 'Buku tidak ditemukan'], 404);
    }
}

}

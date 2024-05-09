<?php

namespace App\Http\Controllers;

use App\Models\Buku;
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
        $buku = Buku::with('kategori')->find($id);
        if ($buku) {
            return view('user.detailBuku')->with('buku', $buku);
        } else {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }
    }

}

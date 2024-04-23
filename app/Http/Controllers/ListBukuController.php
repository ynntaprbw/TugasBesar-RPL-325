<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class ListBukuController extends Controller
{
    public function showAll()
    {
        // Retrieve all books
        $bukus = Buku::all();
        
        // Return the books as JSON response
        return response()->json($bukus);
    }

    public function filterByJudul(Request $request)
    {
        // Retrieve the 'judul' keyword from the request
        $keyword = $request->input('judul');

        // Filter books by title using the 'judul' keyword
        $bukus = Buku::where('judulBuku', 'like', '%' . $keyword . '%')->get();
        
        // Return the filtered books as JSON response
        return response()->json($bukus);
    }
}

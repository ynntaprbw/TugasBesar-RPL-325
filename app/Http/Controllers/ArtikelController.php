<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Artikel;
use App\Models\Customer;

class ArtikelController extends Controller
{
    // Method to show all articles
    public function index()
    {
        $articles = Artikel::all();
        return view('customer.artikel')->with('articles', $articles);
    }

    // Method to store a new article
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'idCustomer' => 'required|exists:customers,id',
            'media' => 'required|string|max:255',
            'judulArtikel' => 'required|string|max:255',
            'sumberArtikel' => 'required|string|max:255',
            'thumbnail' => 'nullable|string',
            'tanggalUnggah' => 'required|date',
        ]);

        // Create a new article instance
        $article = Artikel::create($request->all());

        // Return the newly created article
        return response()->json($article, 201);
    }

    // Method to show a specific article
    public function show($id)
    {
        $article = Artikel::findOrFail($id);
        return response()->json($article);
    }

    // Method to update an existing article
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'idCustomer' => 'exists:customers,id',
            'media' => 'string|max:255',
            'judulArtikel' => 'string|max:255',
            'sumberArtikel' => 'string|max:255',
            'thumbnail' => 'nullable|string',
            'tanggalUnggah' => 'date',
        ]);

        // Find the article by ID
        $article = Artikel::findOrFail($id);

        // Update the article with the request data
        $article->update($request->all());

        // Return the updated article
        return response()->json($article, 200);
    }

    // Method to delete an article
    public function destroy($id)
    {
        // Find the article by ID and delete it
        $article = Artikel::findOrFail($id);
        $article->delete();

        // Return a success response
        return response()->json(['message' => 'Article deleted successfully'], 200);
    }
}

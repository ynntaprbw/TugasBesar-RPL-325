<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ListBukuController extends Controller
{
    public function create()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use Laravel\Scout\Searchable;
use Illuminate\Http\Request;

class Buku extends Model
{
    use Searchable, HasFactory;

    protected $table = 'buku'; // Assuming your table name is 'buku'
    protected $primaryKey = 'idBuku';

    protected $fillable = [
        'idBuku',
        'idKategori',
        'judulBuku',
        'namaPenulis',
        'namaPenerbit',
        'tahunTerbit',
        'harga',
        'stokBuku',
        'fotoSampul',
        'jumlahHalaman',
        'sinopsis',
        'ISBN',
        'bahasa',
    ];

    // You can define relationships here if needed, for example:
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'idKategori');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $bukus = Buku::search($keyword)->get();
        return view('user.beranda', compact('bukus'));
    }

}

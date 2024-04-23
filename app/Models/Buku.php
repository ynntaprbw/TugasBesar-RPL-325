<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku'; // Assuming your table name is 'buku'

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
}

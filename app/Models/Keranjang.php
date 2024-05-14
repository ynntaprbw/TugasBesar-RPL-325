<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Buku;
use App\Models\Ulasan;
use App\Models\kategori;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey = 'idKeranjang';

    protected $fillable = [
        'jumlah_buku',
        'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'idBuku');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'idKategori');
    }
}

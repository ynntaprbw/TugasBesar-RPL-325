<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'idPeminjaman';

    protected $fillable = [
        'tanggalPeminjaman',
        'durasiPeminjaman',
        'batasPengembalian',
        'tanggalPengembalian',
        'statusPeminjaman',
        'statusPengambilan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'idBuku');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $primaryKey = 'idPembelian';

    protected $fillable = [
        'tanggalPembelian',
        'diskon',
        'total_bayar',
        'metodePembayaran',
        'statusPembayaran',
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

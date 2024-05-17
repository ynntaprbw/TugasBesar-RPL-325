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
        'konfirmasi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'idBuku');
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     // Event listener saat menyimpan atau memperbarui data peminjaman
    //     static::saving(function ($peminjaman) {
    //         // Periksa apakah tanggal pengembalian melebihi batas pengembalian
    //         if ($peminjaman->tanggalPengembalian > $peminjaman->batasPengembalian) {
    //             // Jika ya, atur status peminjaman menjadi "Telat"
    //             $peminjaman->statusPeminjaman = 'Telat';
    //         } else {
    //             // Jika tidak, atur kembali status peminjaman sesuai kondisi lainnya
    //             // Misalnya, di sini saya asumsikan jika tepat waktu maka status akan menjadi "Tepat Waktu"
    //             $peminjaman->statusPeminjaman = 'Tepat Waktu';
    //         }
    //     });
    // }
}

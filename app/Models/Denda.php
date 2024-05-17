<?php

namespace App\Models;

use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Denda extends Model
{
    protected $table = 'denda';
    protected $primaryKey = 'idDenda';

    protected $fillable = [
        'totalDenda',
        'tanggalBayarDenda',
        'statusDenda',
        'metodePembayaran',
        'konfirmasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'idPeminjaman');
    }
}

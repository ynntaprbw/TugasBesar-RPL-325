<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Buku;
use App\Models\Kategori;


class Ulasan extends Model
{
    protected $table = 'ulasan';

    protected $fillable = [
        'idUser',
        'idBuku',
        'rating',
        'komentar',
        'tanggalUlasan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'idBuku');
    }
}
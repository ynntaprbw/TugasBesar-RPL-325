<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;


class Kategori extends Model
{
    protected $table = 'kategori'; // Assuming your table name is 'kategori'
    protected $primaryKey = 'idKategori';

    protected $fillable = [
        'namaKategori',
        'deskripsi',
    ];

    // You can define relationships here if needed
    // For example, if a Kategori has many Buku
    public function bukus()
    {
        return $this->hasMany(Buku::class, 'idKategori');
    }
}


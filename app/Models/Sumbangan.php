<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumbangan extends Model
{
    protected $table = 'sumbangan';
    protected $primaryKey = 'idSumbangan';

    protected $fillable = [
        'jumlah_buku',
        'tanggalSumbangan',
        'tanggalPenyerahan',
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

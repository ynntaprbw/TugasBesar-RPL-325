<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumbangan extends Model
{
    protected $table = 'sumbangan';
    protected $primaryKey = 'idBukuSumbangan';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'idKategori',
        'judulBuku',
        'bahasa',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'idKategori');
    }
}

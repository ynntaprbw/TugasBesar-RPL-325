<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Buku;
use App\Models\Kategori;


class Ulasan extends Model
{
    protected $table = 'ulasan';

    protected $fillable = [
        'idCustomer',
        'idBuku',
        'rating',
        'komentar',
        'tanggalUlasan',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'idCustomer');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'idBuku');
    }
}
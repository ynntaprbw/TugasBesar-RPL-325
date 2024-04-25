<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel'; // Assuming your table name is 'artikel'

    protected $fillable = [
        'idUser',
        'media',
        'judulArtikel',
        'sumberArtikel',
        'thumbnail',
        'tanggalUnggah',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}

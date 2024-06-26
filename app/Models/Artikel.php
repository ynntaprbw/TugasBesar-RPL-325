<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel'; // Assuming your table name is 'artikel'

    protected $fillable = [
        'id',
        'media',
        'judulArtikel',
        'sumberArtikel',
        'thumbnail',
        'tanggalUnggah',
    ];

    // Define relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'idCustomer');
    }
}

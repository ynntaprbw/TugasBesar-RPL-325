<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Denda extends Model
{
    use HasFactory;

    protected $table = 'denda';
    protected $primaryKey = 'idDenda';

    protected $fillable = [
        'idPeminjaman',
        'id',
        'totalDenda',
        'tanggalBayarDenda',
        'statusDenda',
        'metodePembayaran',
        'konfirmasi',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'idPeminjaman');
    }
}

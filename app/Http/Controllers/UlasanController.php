<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pembelian;
use App\Models\Buku;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index()
    {
        // Mengambil buku-buku dari tabel peminjaman
        $bukuDariPeminjaman = Peminjaman::select('idBuku')
            ->where('statusPengambilan', 'Diambil')
            ->distinct() // Menghindari duplikasi buku
            ->pluck('idBuku');

        // Mengambil buku-buku dari tabel pembelian
        $bukuDariPembelian = Pembelian::select('idBuku')
            ->where('statusPengambilan', 'Diambil')
            ->distinct() // Menghindari duplikasi buku
            ->pluck('idBuku');

        // Menggabungkan buku-buku dari kedua sumber
        $buku = Buku::whereIn('idBuku', $bukuDariPeminjaman)
            ->orWhereIn('idBuku', $bukuDariPembelian)
            ->get();

        // Tentukan status untuk setiap buku
        $buku->map(function ($item) use ($bukuDariPeminjaman, $bukuDariPembelian) {
            if ($bukuDariPeminjaman->contains($item->idBuku) && $bukuDariPembelian->contains($item->idBuku)) {
                $item->status = 'Dibeli';
            } elseif ($bukuDariPeminjaman->contains($item->idBuku)) {
                $item->status = 'Dipinjam';
            } elseif ($bukuDariPembelian->contains($item->idBuku)) {
                $item->status = 'Dibeli';
            }
            return $item;
        });

        return view('user.ulasan', compact('buku', 'bukuDariPeminjaman', 'bukuDariPembelian'));
    }
}


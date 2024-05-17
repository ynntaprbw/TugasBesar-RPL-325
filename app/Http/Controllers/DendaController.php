<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DendaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function tambahDenda(Request $request)
    {
        // Validasi request
        $request->validate([
            'idPeminjaman' => 'required|exists:peminjaman,idPeminjaman'
        ]);

        // Mendapatkan data peminjaman
        $peminjaman = Peminjaman::findOrFail($request->idPeminjaman); 

        // Menghitung denda
        $batasPengembalian = new Carbon($peminjaman->batasPengembalian);
        $tanggalPengembalian = new Carbon($peminjaman->tanggalPengembalian);
        $dendaPerHari = 2000; // Tarif denda per hari
        $selisihHari = $tanggalPengembalian->diffInDays($batasPengembalian);
        $totalDenda = $selisihHari * $dendaPerHari;

        // Simpan data denda
        $denda = new Denda();
        $denda->idPeminjaman = $peminjaman->idPeminjaman;
        $denda->id = $peminjaman->id; // Pastikan ini sesuai dengan skema tabel
        $denda->totalDenda = $totalDenda;
        $denda->save();

        // Tandai peminjaman sebagai telah dikonfirmasi
        $peminjaman->konfirmasi = true;
        $peminjaman->save();

        // Kembalikan ke halaman sebelumnya atau halaman tertentu
        return redirect()->back()->with('success', 'Denda berhasil ditambahkan.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data secara manual jika diperlukan
        $request->validate([
            'tanggal_peminjaman' => 'required|date',
            'durasi_hari' => 'required|numeric|min:1|max:14', // Maksimal durasi peminjaman adalah 14 hari
        ]);

        $tanggalPeminjaman = $request->tanggal_peminjaman;
        $durasiHari = intval($request->durasi_hari);

        // Hitung tanggal pengembalian
        $tanggalPengembalian = Carbon::parse($tanggalPeminjaman)->addDays($durasiHari);

        // Simpan data peminjaman ke dalam tabel
        $selectedBuku = $request->selected_buku;

        // Loop melalui setiap ID buku yang dipilih dan simpan peminjaman untuk setiap buku
        foreach ($selectedBuku as $idKeranjang) {
            // Ambil data keranjang berdasarkan ID
            $keranjang = Keranjang::findOrFail($idKeranjang);

            // Simpan data peminjaman ke dalam tabel
            $peminjaman = new Peminjaman();
            $peminjaman->id = auth()->id(); // Simpan ID pengguna
            $peminjaman->tanggalPeminjaman = $tanggalPeminjaman;
            $peminjaman->durasiPeminjaman = $durasiHari;
            $peminjaman->batasPengembalian = $tanggalPengembalian;
            $peminjaman->idBuku = $keranjang->idBuku; // Simpan ID buku dari keranjang
            // $peminjaman->statusPeminjaman = 'Dipinjam'; // Atau sesuai dengan kebutuhan Anda
            // $peminjaman->statusPengambilan = null; // Kolom status pengembalian akan diisi ketika buku dikembalikan
            $peminjaman->save();

        }

        // Redirect atau kembalikan kembali ke halaman yang sama atau halaman tertentu jika diperlukan
        return redirect()->route('beranda')->with('success', 'Data peminjaman berhasil disimpan.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeminjamanRequest $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}

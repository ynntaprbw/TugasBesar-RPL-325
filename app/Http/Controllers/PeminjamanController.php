<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */ 

    public function index()
    {

        $user_id = session('id');
        $peminjamanItems = Peminjaman::join('buku', 'peminjaman.idBuku', '=', 'buku.idBuku')
                                  ->select('peminjaman.*', 'buku.judulBuku')
                                  ->where('peminjaman.id', $user_id)
                                  ->get();
        return view('user.peminjaman', compact('peminjamanItems'));

    }

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

            $peminjaman->save();

            // Hapus entri keranjang yang sesuai
            $keranjang->delete();
        }

        // Redirect atau kembalikan kembali ke halaman yang sama atau halaman tertentu jika diperlukan
        return redirect()->route('beranda')->with('success', 'Data peminjaman berhasil disimpan.');
    }
}

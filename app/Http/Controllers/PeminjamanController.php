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
                                  ->whereNull('tanggalPengembalian') 
                                  ->get();

        // Ubah format tanggal menjadi objek Carbon
        foreach ($peminjamanItems as $peminjaman) {
            $peminjaman->tanggalPeminjaman = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $peminjaman->tanggalPeminjaman)->startOfDay();
            $peminjaman->batasPengembalian = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $peminjaman->batasPengembalian)->startOfDay();
            // Lakukan hal yang sama untuk kolom tanggal lainnya jika diperlukan
        }
        return view('user.peminjaman', compact('peminjamanItems'));

    }

    public function pengembalian()
    {
        $user_id = session('id');
        $pengembalianItems = Peminjaman::with('buku')
                                        ->where('id', $user_id)
                                        ->whereNotNull('tanggalPengembalian') // Hanya data dengan tanggal pengembalian yang sudah diisi
                                        ->get();

        foreach ($pengembalianItems as $peminjaman) {
            $peminjaman->tanggalPengembalian = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $peminjaman->tanggalPengembalian)->startOfDay();
        }

        return view('user.pengembalian', compact('pengembalianItems'));
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
            $peminjaman->konfirmasi = false;
            $peminjaman->idBuku = $keranjang->idBuku; // Simpan ID buku dari keranjang

            $peminjaman->save();

            // Hapus entri keranjang yang sesuai
            $keranjang->delete();
        }

        // Redirect atau kembalikan kembali ke halaman yang sama atau halaman tertentu jika diperlukan
        return redirect()->route('beranda')->with('success', 'Data peminjaman berhasil disimpan.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Buku;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = session('id');
    
        $pembelianItems = Pembelian::join('buku', 'pembelian.idBuku', '=', 'buku.idBuku')
                                    ->select('pembelian.*', 'buku.judulBuku')
                                    ->where('pembelian.id', $user_id)
                                    ->get();
    
        // Ubah format tanggal menjadi objek Carbon jika ada kolom tanggal yang perlu diubah
        foreach ($pembelianItems as $pembelian) {
            $pembelian->tanggalPembayaran = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $pembelian->tanggalPembayaran)->startOfDay();
            // Lakukan hal yang sama untuk kolom tanggal lainnya jika diperlukan
        }
    
        return view('user.pembelian', compact('pembelianItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'metode_pembayaran' => 'required|string|in:Ovo,Gopay,Shopeepay,Dana',
            'selected_buku' => 'required|array',
            'selected_buku.*' => 'exists:keranjang,idKeranjang',
            'diskon' => 'nullable|numeric|min:0',
        ]);

        $metodePembayaran = $request->metode_pembayaran;
        $selectedBuku = $request->selected_buku;
        $diskon = $request->diskon ?? 0;

        // Loop melalui setiap ID buku yang dipilih dan simpan pembelian untuk setiap buku
        foreach ($selectedBuku as $idKeranjang) {
            // Ambil data keranjang berdasarkan ID
            $keranjang = Keranjang::findOrFail($idKeranjang);

            // Hitung total bayar (misalnya: harga buku - diskon)
            $totalBayar = $keranjang->total_harga - $diskon;

            // Simpan data pembelian ke dalam tabel
            $pembelian = new Pembelian();
            $pembelian->id = auth()->id(); // Simpan ID pengguna
            $pembelian->tanggalPembayaran = now(); // Atur tanggal pembelian saat ini
            $pembelian->diskon = $diskon;
            $pembelian->total_bayar = $totalBayar;
            $pembelian->metodePembayaran = $metodePembayaran;
            $pembelian->statusPembayaran = 'Belum Lunas';
            $pembelian->statusPengambilan = 'Belum Diambil';
            $pembelian->idBuku = $keranjang->idBuku; // Simpan ID buku dari keranjang

            $pembelian->save();

            // Hapus entri keranjang yang sesuai
            $keranjang->delete();
        }

        // Redirect atau kembalikan kembali ke halaman yang sama atau halaman tertentu jika diperlukan
        return redirect()->route('beranda')->with('success', 'Pembelian berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembelianRequest $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}

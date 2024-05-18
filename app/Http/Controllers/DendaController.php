<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use App\Models\Peminjaman;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DendaController extends Controller
{

    public function index()
    {
        // Mendapatkan semua data denda
        $dendaItems = Denda::with('peminjaman.buku')->get();
        

        // Mengirim data ke view
        return view('user.denda', compact('dendaItems'));
    }
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
        
        // Hitung selisih hari tanpa memperhatikan perbedaan waktu
        $selisihHari = $tanggalPengembalian->diffInDays($batasPengembalian, false);
    
        // Tarif denda per hari
        $dendaPerHari = 2000; 
    
        // Hitung total denda
        $totalDenda = ceil($selisihHari * $dendaPerHari / 2000) * (-2000);
    
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

    public function showFormDenda(Denda $denda)
    {
        $metodePembayaranOptions = ['Ovo', 'Gopay', 'Shopeepay', 'Dana'];
        return view('user.form_denda', compact('denda', 'metodePembayaranOptions'));
    }

    public function submitPelunasanDenda(Request $request)
    {
        // Validasi request
        $request->validate([
            'idDenda' => 'required|exists:denda,idDenda',
            'metode_pembayaran' => 'required|in:Ovo,Gopay,Shopeepay,Dana', // sesuaikan dengan pilihan metode pembayaran
        ]);

        // Dapatkan data denda berdasarkan id
        $denda = Denda::findOrFail($request->idDenda);

        // Lakukan proses pembayaran denda di sini
        // Misalnya, Anda dapat menyimpan metode pembayaran yang dipilih ke dalam database atau melakukan tindakan lain sesuai kebutuhan aplikasi Anda.

        // Setelah proses pembayaran selesai, Anda dapat mengubah status pembayaran denda menjadi "Lunas"
        $denda->statusDenda = 'Tunggu Konfirmasi';
        $denda->metodePembayaran = $request->metode_pembayaran;
        $denda->tanggalBayarDenda = now(); // misalnya, tanggal bayar denda diatur sebagai tanggal saat ini
        $denda->save();

        // Redirect pengguna ke halaman yang sesuai
        return redirect()->route('denda')->with('success', 'Pelunasan denda berhasil.');
    }
}
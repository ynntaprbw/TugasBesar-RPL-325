<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the cart items.
     */
    public function index()
    {
        $user_id = session('id');
        $keranjangItems = Keranjang::where('id', $user_id)->get();
        return view('user.keranjang', compact('keranjangItems'));
    }


    public function store(Request $request, $idBuku)
    {
        $buku = Buku::findOrFail($idBuku);

        // Cek apakah buku sudah ada di keranjang
        $keranjang = Keranjang::where('idBuku', $buku->idBuku)
                                ->where('id', auth()->id())
                                ->first();

        if ($keranjang) {
            // Jika buku sudah ada di keranjang, update jumlah buku
            $keranjang->jumlah_buku += $request->input('quantity', 1);
            $keranjang->total_harga = $buku->harga * $keranjang->jumlah_buku;
            $keranjang->save();
        } else {
            // Jika buku belum ada di keranjang, tambahkan ke keranjang
            $keranjang = new Keranjang();
            $keranjang->idBuku = $buku->idBuku;
            $keranjang->idKategori = $buku->idKategori;
            $keranjang->id = auth()->id();
            $keranjang->jumlah_buku = $request->input('quantity', 1);
            $keranjang->total_harga = $buku->harga * $keranjang->jumlah_buku;
            $keranjang->save();
        }

        return redirect()->back()->with('success');
    }


    public function update(Request $request, $id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->jumlah_buku = $request->input('quantity');
        $keranjang->total_harga = $keranjang->buku->harga * $request->input('quantity');
        $keranjang->save();

        return redirect()->back()->with('success');
    }


    public function destroy($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();

        return redirect()->back()->with('success');
    }

    public function checkout(Request $request)
    {
        // Validasi request di sini jika diperlukan
        $selectedBuku = $request->input('selected_buku', []);
        $action = $request->action;

        // Cek apakah ada buku yang dipilih
        if (empty($selectedBuku)) {
            return redirect()->back()->with('error', 'Tidak ada buku yang dipilih untuk melakukan checkout.');
        }

        $selectedBukuDetails = [];

        // Ambil detail buku berdasarkan ID buku dari setiap idKeranjang yang dipilih
        foreach ($selectedBuku as $idKeranjang) {
            $keranjang = Keranjang::findOrFail($idKeranjang);
            $buku = $keranjang->buku;

            // Simpan detail yang dibutuhkan ke dalam array
            $selectedBukuDetails[$idKeranjang] = [
                'judulBuku' => $buku->judulBuku,
                'namaPenulis' => $buku->namaPenulis,
            ];
        }

        if ($action == 'beli') {
            return view('user.form_pembelian', compact('selectedBuku', 'selectedBukuDetails'));
        } elseif ($action == 'pinjam') {
            return view('user.form_peminjaman', compact('selectedBuku', 'selectedBukuDetails'));
        } else {
            return redirect()->back()->with('error', 'Tidak ada tindakan yang valid.');
        }
    }


    // public function checkout(Request $request)
    // {
    //     // Ambil array ID buku yang dipilih dari input tersembunyi
    //     $selectedBukuIds = $request->input('selected_buku_ids', []);

    //     $action = $request->input('action');

    //     if ($action == 'beli') {
    //         return view('user.form_pembelian', compact('selectedBukuIds'));
    //     } elseif ($action == 'pinjam') {
    //         return view('user.form_peminjaman', compact('selectedBukuIds'));
    //     } else {
    //         return redirect()->back()->with('error', 'Tidak ada tindakan yang valid.');
    //     }
    // }
}

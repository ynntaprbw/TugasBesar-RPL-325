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

        $keranjang = new Keranjang();
        $keranjang->idBuku = $buku->id;
        $keranjang->idKategori = $buku->idKategori;
        $keranjang->id = session('id'); // Menggunakan session user_id
        $keranjang->jumlah_buku = $request->input('quantity', 1);
        $keranjang->total_harga = $buku->harga * $keranjang->jumlah_buku;
        $keranjang->save();

        return redirect()->back()->with('success');
    }

    public function update(Request $request, $id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->jumlah_buku = $request->input('quantity');
        $keranjang->total_harga = $keranjang->buku->harga * $request->input('quantity');
        $keranjang->save();

        return redirect()->back()->with('success', 'Kuantitas produk dalam keranjang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}

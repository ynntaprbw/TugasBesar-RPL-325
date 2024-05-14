@extends('user.dashboard')
@section('content')
<div class="">
    <div> 
        <h1>Informasi Buku</h1>
    </div>
    <br>
    <div class="flex flex-row gap-20">
        <img src="" alt="img Buku">
        <div class="">
            <h1>Judul Buku: {{ $buku->judulBuku }}</h1>
            <h2>Author: {{ $buku->namaPenulis }}</h2>
            <h3>kategori: {{ $buku->kategori->namaKategori }}</h3>
            <div>
                Rating: 
            </div>
            <h2>Harga: {{ $buku->harga }}</h2>
            <br>
            <div>
                <h3>Deskripsi</h3>
                <p>{{ $buku->sinopsis }}</p>
            </div>
            <br>
            <div>
                Detail
                <div class="flex gap-8">
                    <ul>
                        <li>ISBN</li>
                        <li>{{ $buku->ISBN }}</li>
                        <li>Jumlah Halaman</li>
                        <li>{{ $buku->jumlahHalaman }}</li>
                        <li>Tahun Terbit</li>
                        <li>{{ $buku->tahunTerbit }}</li>
                        <li>Bahasa</li>
                        <li>{{ $buku->bahasa }}</li>
                    </ul>
                    <ul>
                        <li>Penerbit</li>
                        <li>{{ $buku->namaPenerbit }}</li>
                        <li>Berat</li>
                        <li>(berat)</li>
                        <li>Panjang</li>
                        <li>(panjang)</li>
                        <li>Lebar</li>
                        <li>(Lebar)</li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <h1>Ingin beli atau Pinjam berapa ?</h1>
            <h2>Jumlah barang</h2>
            <h3>(tambah barang)</h3>

            {{-- Tombol buat tambahkan ke keranjang --}}
            <div class="flex items-center justify-between">
                <form action="{{ route('keranjang.store', ['idBuku' => $buku->idBuku]) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Tambah ke Keranjang</button>
                </form>
            </div>

        </div>
    </div>

</div>
@endsection

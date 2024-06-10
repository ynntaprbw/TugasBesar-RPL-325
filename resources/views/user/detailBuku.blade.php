@extends('user.dashboard')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div class="text-center">
        <h1 class="text-2xl font-bold">Informasi Buku</h1>
        <img src="" alt="img Buku" class="mx-auto my-4">
        <h2 class="text-lg">Judul Buku: {{ $buku->judulBuku }}</h2>
        <h3 class="text-md">Author: {{ $buku->namaPenulis }}</h3>
        <p class="text-sm">Kategori: {{ $buku->kategori->namaKategori }}</p>
        <p class="text-sm">Rating: </p>
        <h2 class="text-lg">Harga: {{ $buku->harga }}</h2>
        <div class="my-4">
            <h3 class="text-lg">Deskripsi</h3>
            <p class="text-sm">{{ $buku->sinopsis }}</p>
        </div>
    </div>
    <div>
        <div>
            <h3 class="text-lg">Detail</h3>
            <ul class="grid grid-cols-2 gap-4">
                <li>ISBN</li>
                <li>{{ $buku->ISBN }}</li>
                <li>Jumlah Halaman</li>
                <li>{{ $buku->jumlahHalaman }}</li>
                <li>Tahun Terbit</li>
                <li>{{ $buku->tahunTerbit }}</li>
                <li>Bahasa</li>
                <li>{{ $buku->bahasa }}</li>
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
        <div>
            <h3 class="text-lg">Ingin beli atau Pinjam berapa ?</h3>
            <h4 class="text-md">Jumlah barang</h4>
            <p class="text-sm">(tambah barang)</p>
            <div class="flex justify-end">
                <form action="{{ route('keranjang.store', ['idBuku' => $buku->idBuku]) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah ke Keranjang</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

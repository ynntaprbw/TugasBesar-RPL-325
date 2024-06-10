@extends('user.dashboard')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
    <div class="text-center">
        <h1 class="text-2xl font-bold mb-4">Informasi Buku</h1>
        <div class="relative w-full pt-[150%] bg-gray-200 rounded-lg overflow-hidden mb-4" style="background-image: url('{{ Storage::url($buku->fotoSampul) }}'); background-size: cover; background-position: center;">
            <!-- Optional: Add an overlay or any other content inside this div -->
        </div>
        <h2 class="text-lg font-semibold">Judul Buku: {{ $buku->judulBuku }}</h2>
        <h3 class="text-md text-gray-600">Author: {{ $buku->namaPenulis }}</h3>
        <p class="text-sm text-gray-600">Kategori: {{ $buku->kategori->namaKategori }}</p>
        <p class="text-sm text-gray-600">Rating: {{ $buku->rating }}</p>
        <h2 class="text-lg font-bold text-blue-800 mt-4">Harga: Rp. {{ $buku->harga }}</h2>
        <div class="my-4">
            <h3 class="text-lg font-semibold">Deskripsi</h3>
            <p class="text-sm text-gray-600">{{ $buku->sinopsis }}</p>
        </div>
    </div>
    <div>
        <div class="mb-8">
            <h3 class="text-lg font-semibold mb-2">Detail</h3>
            <ul class="grid grid-cols-2 gap-4 text-sm text-gray-600">
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
            </ul>
        </div>
        <div class="flex justify-end">
            <form action="{{ route('keranjang.store', ['idBuku' => $buku->idBuku]) }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah ke Keranjang</button>
            </form>
        </div>
    </div>
</div>
@endsection

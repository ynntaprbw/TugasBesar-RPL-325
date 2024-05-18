{{-- @extends('user.dashboard')
@section('content')
<div class="grid grid-cols-4 gap-4">
    @foreach($ulasans as $ulasan)
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700">
        <p>User: <span class="text-blue-700 font-bold">{{$ulasan->name}}</span></p>
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">{{ $ulasan->komentar }}</h5>
        </a>
        <p class="text-xl">Rating: <span class="text-blue-700 font-bold">{{ $ulasan->rating }}</span></p>
        <p class="text-black my-2">Tanggal: {{ $ulasan->tanggalUlasan }}</p>
    </div>
    @endforeach
</div>
@endsection --}}

@extends('user.dashboard')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-4">Ulasan Buku</h1>
    <div class="mt-4">
        @foreach($buku as $b)
        <div class="bg-white shadow-md rounded px-8 py-6 mb-4">
            <h2 class="text-xl font-bold mb-2">{{ $b->judulBuku }}</h2>
            <p class="text-gray-700">Penulis: {{ $b->namaPenulis }}</p>
            <p class="text-gray-700">Kategori: {{ $b->Kategori->namaKategori }}</p>

            <p class="text-gray-700">Status: {{ $b->status }}</p> <!-- Menampilkan status -->

            <!-- Tambahkan tombol ulasan yang mengarahkan ke halaman ulasan buku -->
            <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2 inline-block">Ulasan</a>
        </div>
        @endforeach
    </div>
</div>
@endsection


@extends('user.dashboard')
@section('content')
<div>
    <h1 class="text-3xl">Haloo, <span class="font-bold">{{ Auth::user()->namaLengkap }}</span> selamat datang di <span class="font-bold text-green-950">Libratur</span> !</h1>
    {{-- Menampilkan data dari tabel buku --}}
    <div class="">
        @foreach($bukus as $buku)
        <div class="bg-white shadow-md rounded-lg p-4">
            <p class="">{{ $buku->judulBuku }}</p>
            <p class="">Penulis: {{ $buku->namaPenulis }}</p>
            <p class="">Harga: {{ $buku->harga }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection

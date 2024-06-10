@extends('user.dashboard')
@section('content')
<div class="">
    <h1 class="text-3xl">Haloo, <span class="font-bold">{{ Auth::user()->name }}</span> selamat datang di <span class="font-bold text-green-950">Libratur</span> !</h1>
        <br>
        <h1 class="text-xl">Kamu mau pinjam atau beli buku apa hari ini?</h1>
        <br>

        {{-- Search Bar --}}

        {{-- <form class="max-w-md mx-auto my-8">
            <div class="flex px-4 items-center border border-gray-300 rounded-lg bg-gray-50 focus-within:ring-2 focus-within:ring-blue-500">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <input type="search" id="default-search" class="block w-full p-4 text-sm text-gray-900 bg-gray-50 rounded-l-lg focus:outline-none" placeholder="Cari buku..." required />
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form> --}}

    {{-- Menampilkan data dari tabel buku --}}
    <div class="grid grid-cols-4 gap-4">
        @foreach($bukus as $buku)

        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-xl shadow dark:bg-white dark:border-gray-700">
            <!-- Ketika gambar bisa dimuat maka akan memunculkan foto Sampul -->
            <a href="{{ route('detailBuku', ['idBuku' => $buku->idBuku]) }}" style="background-image: url('{{ Storage::url($buku->fotoSampul) }}'); background-size: cover; background-position: center; display: block; height: 200px;">
            </a>
            <div class="px-5 pb-5">
                <a href="{{ route('detailBuku', ['idBuku' => $buku->idBuku]) }}">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-900">{{ $buku->judulBuku }}</h5>
                </a>
                <p class="text-gray-900">Penulis: {{ $buku->namaPenulis }}</p>
                <div class="flex items-center my-2">
                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400">{{ $buku->rating }}</span>
                </div>
                <p></p>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-2xl font-bold text-blue-800 dark:text-blue-800">Rp. {{ $buku->harga }}</span><div class=" ">
                    </div>
                    <form action="{{ route('keranjang.store', ['idBuku' => $buku->idBuku]) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambahkan Keranjang</button>
                    </form>
                </div>
            </div>
        </div>


        @endforeach
    </div>
</div>
@endsection

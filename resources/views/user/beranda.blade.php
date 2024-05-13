@extends('user.dashboard')
@section('content')
<div>
    <h1 class="text-3xl">Haloo, <span class="font-bold">{{ Auth::user()->name }}</span> selamat datang di <span class="font-bold text-green-950">Libratur</span> !</h1>
        <br>
        <h1 class="text-xl">Kamu mau pinjam atau beli buku apa hari ini?</h1>
        <br>
        <button type="button" class="text-gray-900 bg-green-400 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 p-2 text-center me-2 mb-2 dark:bg-green-400 dark:hover:bg-green-700 dark:focus:ring-green-800">Green</button>
        <button type="button" class="text-gray-900 bg-red-400 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 p-2 text-center me-2 mb-2 dark:bg-red-400 dark:hover:bg-red-700 dark:focus:ring-red-900">Red</button>
        <button type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 p-2 text-center me-2 mb-2 dark:focus:ring-yellow-900">Yellow</button>
        <button type="button" class="text-white bg-purple-400 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 p-2 text-center mb-2 dark:bg-purple-400 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Purple</button>

    {{-- Menampilkan data dari tabel buku --}}
    <div class="grid grid-cols-4 gap-4">
        @foreach($bukus as $buku)
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-xl shadow dark:bg-white dark:border-gray-700">
            <a href="#">
                <img class="p-8 rounded-t-lg" src="/docs/images/products/apple-watch.png" alt="product image" />
            </a>
            <div class="px-5 pb-5">
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-900">{{ $buku->judulBuku }}</h5>
                </a>
                <p class="text-gray-900">Penulis: {{ $buku->namaPenulis }}</p>


                <div class="flex items-center">
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-blue-800 dark:text-blue-800">Rp. {{ $buku->harga }}</span>
                    <a href="#" class="text-gray-100 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambahkan Keranjang</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

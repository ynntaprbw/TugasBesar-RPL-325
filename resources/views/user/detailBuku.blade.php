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
            <h1>Judul Buku</h1>
            <h2>Author</h2>
            <h3>kategori</h3>
            <div>
                Rating
            </div>
            <h2>Harga</h2>
            <br>
            <div>
                <h3>Deskripsi</h3>
                <p>isi deskripsi</p>
            </div>
            <br>
            <div>
                Detail
                <div class="flex gap-8">
                    <ul>
                        <li>ISBN</li>
                        <li>(ISBN)</li>
                        <li>Jumlah Halaman</li>
                        <li>(halaman)</li>
                        <li>Tanggal Terbit</li>
                        <li>(tanggal)</li>
                        <li>Bahasa</li>
                        <li>(bahasa)</li>
                    </ul>
                    <ul>
                        <li>Penerbit</li>
                        <li>(penerbit)</li>
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
            <div>
                <a href="">
                    <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Tambah ke Keranjang</button>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection

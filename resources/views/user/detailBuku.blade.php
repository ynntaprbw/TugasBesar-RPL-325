@extends('user.dashboard')

@section('content')
<div class="container mx-auto p-4 mt-16"> <!-- Added mt-16 to ensure the container starts below the navbar -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="card bg-white shadow-md rounded-lg overflow-hidden">
            <div class="w-full pt-[150%] bg-gray-200 rounded-lg overflow-hidden mb-4" style="background-image: url('{{ Storage::url($buku->fotoSampul) }}'); background-size: cover; background-position: center;">
                <!-- Optional: Add an overlay or any other content inside this div -->
            </div>
            <div class="p-4">
                <h2 class="text-lg text-center font-bold">{{ $buku->judulBuku }}</h2>
                <br>
                <h3 class="text-sm">Author: <span class="font-bold text-blue-600">{{ $buku->namaPenulis }}</span></h3>
                <br>
                <p class="text-sm">Kategori: <span class="font-bold text-blue-600">{{ $buku->kategori->namaKategori }}</span></p>
                <br>
                <h2 class="text-lg">Harga: <span class="font-bold text-blue-600">Rp. {{ number_format($buku->harga, 0, ',', '.') }}</span></h2>
                <div class="my-4">
                    <h3 class="text-lg">Deskripsi</h3>
                    <p class="text-sm">{{ $buku->sinopsis }}</p>
                </div>
            </div>
        </div>
        <div class="card bg-white shadow-md rounded-lg p-4">
            <div>
                <h3 class="text-lg font-semibold mb-2">Detail</h3>
                <ul class="grid grid-cols-2 gap-4 mb-6">
                    <li class="font-medium">ISBN</li>
                    <li>{{ $buku->ISBN }}</li>
                    <li class="font-medium">Jumlah Halaman</li>
                    <li>{{ $buku->jumlahHalaman }}</li>
                    <li class="font-medium">Tahun Terbit</li>
                    <li>{{ $buku->tahunTerbit }}</li>
                    <li class="font-medium">Bahasa</li>
                    <li>{{ $buku->bahasa }}</li>
                    <li class="font-medium">Penerbit</li>
                    <li>{{ $buku->namaPenerbit }}</li>
                </ul>
            </div>
            <div class="mb-6">
                <form action="{{ route('keranjang.store', ['idBuku' => $buku->idBuku]) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Tambah ke Keranjang</button>
                </form>
            </div>
            <h2 class="text-2xl font-bold mt-6 mb-4">Ulasan</h2>
            <div class="mb-6">
                <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" data-modal-toggle="ulasanModal">Beri Ulasan</button>
                @forelse($ulasans as $ulasan)
                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow mb-4">
                        <p>User: <span class="text-blue-700 font-bold">{{ $ulasan->name }}</span></p>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $ulasan->komentar }}</h5>
                        <p class="text-xl">Rating: <span class="text-blue-700 font-bold">{{ $ulasan->rating }}</span></p>
                        <p class="text-black my-2">Tanggal: {{ $ulasan->tanggalUlasan }}</p>
                    </div>
                @empty
                    <p class="text-gray-700">Belum ada ulasan untuk buku ini.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="ulasanModal" class="hidden fixed z-50 inset-0 overflow-y-auto flex items-center justify-center">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Beri Ulasan</h3>
            <form action="{{ route('ulasan.store', ['idBuku' => $buku->idBuku]) }}" method="POST">
                @csrf
                <div class="mt-2">
                    <label for="komentar" class="block text-sm font-medium text-gray-700">Komentar</label>
                    <textarea id="komentar" name="komentar" rows="4" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required></textarea>
                </div>
                <div class="mt-2">
                    <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                    <input type="number" id="rating" name="rating" min="1" max="5" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Kirim Ulasan</button>
                </div>
            </form>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:w-auto sm:text-sm" data-modal-toggle="ulasanModal">Tutup</button>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('[data-modal-toggle]').forEach(function(element) {
    element.addEventListener('click', function() {
        var modal = document.getElementById(element.getAttribute('data-modal-toggle'));
        modal.classList.toggle('hidden');
    });
});
</script>
@endsection

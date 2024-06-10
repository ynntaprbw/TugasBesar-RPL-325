@extends('user.dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div class="text-center">
        <h1 class="text-2xl font-bold">Informasi Buku</h1>
        <img src="{{ $buku->gambarUrl ?? '' }}" alt="img Buku" class="mx-auto my-4">
        <h2 class="text-lg">Judul Buku: {{ $buku->judulBuku }}</h2>
        <h3 class="text-md">Author: {{ $buku->namaPenulis }}</h3>
        <p class="text-sm">Kategori: {{ $buku->kategori->namaKategori }}</p>
        <p class="text-sm">Rating: {{ $buku->rating }}</p>
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
                <li>{{ $buku->berat }}</li>
                <li>Panjang</li>
                <li>{{ $buku->panjang }}</li>
                <li>Lebar</li>
                <li>{{ $buku->lebar }}</li>
            </ul>
        </div>
        <div>
            <h3 class="text-lg">Ingin beli atau pinjam berapa?</h3>
            <h4 class="text-md">Jumlah barang</h4>
            <p class="text-sm">Tambah barang</p>
            <div class="flex justify-end">
                <form action="{{ route('keranjang.store', ['idBuku' => $buku->idBuku]) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah ke Keranjang</button>
                </form>
            </div>
        </div>
        <h2 class="text-2xl font-bold mt-6 mb-4">Ulasan</h2>
        <div>
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

<!-- Modal -->
<div id="ulasanModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
  <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <!-- Modal content -->
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

@extends('user.dashboard')

@section('content')
<div class="max-w-md mx-auto bg-white rounded p-8">
    <h2 class="text-2xl font-bold mb-4">Form Pembelian</h2>
    <form action="{{ route('pembelian.store') }}" method="POST">
        @csrf

        {{-- {{ dd($selectedBuku) }} --}}

        @foreach($selectedBuku as $idKeranjang)
            <input type="hidden" name="selected_buku[]" value="{{ $idKeranjang }}">
        @endforeach

        <!-- Tampilkan detail buku -->
        <div class="mb-4">
            <h2 class="text-xl font-bold mb-2">Detail Buku</h2>
            @foreach ($selectedBukuDetails as $idKeranjang => $detail)
                <div class="mb-2">
                    <p>Judul Buku: {{ $detail['judulBuku'] }}</p>
                    <p>Penulis: {{ $detail['namaPenulis'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="mb-4">
            <label for="nama_lengkap" class="block text-sm font-bold mb-2">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" class="border border-gray-400 p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="tanggal_pembelian" class="block text-sm font-bold mb-2">Tanggal Pengambilan Buku Fisik:</label>
            <input type="date" id="tanggal_pembelian" name="tanggal_pembelian" class="border border-gray-400 p-2 w-full" required>
        </div>

        <div class="mb-4">
            <input type="checkbox" id="persetujuan" name="persetujuan" class="mr-2" required>
            <label for="persetujuan" class="text-sm">Saya menyetujui ketentuan pembelian.</label>
        </div>

        <!-- Metode Pembayaran -->
        <div>
            <label for="metode_pembayaran" class="block text-sm font-bold mb-2">Metode Pembayaran:</label>
            <select id="metode_pembayaran" name="metode_pembayaran" class="border border-gray-400 p-2 w-full" required>
                @foreach($metodePembayaranOptions as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Submit Pembelian</button>
        </div>
    </form>
</div>
@endsection
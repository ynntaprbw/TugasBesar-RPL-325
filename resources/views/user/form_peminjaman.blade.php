@extends('user.dashboard')

@section('content')
<div class="max-w-md mx-auto bg-white rounded p-8">
    <h2 class="text-2xl font-bold mb-4">Form Peminjaman</h2>
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        

        @foreach($selected_buku as $idKeranjang)
            <input type="hidden" name="selected_buku[]" value="{{ $idKeranjang }}">
        @endforeach

        <div class="mb-4">
            <label for="nama_lengkap" class="block text-sm font-bold mb-2">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" class="border border-gray-400 p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="tanggal_peminjaman" class="block text-sm font-bold mb-2">Tanggal Peminjaman:</label>
            <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" class="border border-gray-400 p-2 w-full" required>
        </div>

        {{-- <div class="mb-4">
            <label for="tanggal_pengembalian" class="block text-sm font-bold mb-2">Tanggal Pengembalian:</label>
            <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" class="border border-gray-400 p-2 w-full" required>
        </div> --}}

        <div class="mb-4">
            <label for="durasi_hari" class="block text-sm font-bold mb-2">Durasi Hari Peminjaman:</label>
            <input type="number" id="durasi_hari" name="durasi_hari" class="border border-gray-400 p-2 w-full" min="1" required>
        </div>

        <div class="mb-4">
            <input type="checkbox" id="persetujuan" name="persetujuan" class="mr-2" required>
            <label for="persetujuan" class="text-sm">Saya menyetujui ketentuan peminjaman.</label>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Submit Peminjaman</button>
        </div>
    </form>
</div>
@endsection
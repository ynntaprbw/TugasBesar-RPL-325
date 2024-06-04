@extends('user.dashboard')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Form Sumbang Buku</h1>
        
        <form action="{{ route('sumbangan.store') }}" method="POST" class="max-w-2xl mx-auto p-4 bg-white shadow-md rounded-lg">
            @csrf
            <div class="mb-4">
                <label for="judulBuku" class="block text-gray-700">Judul Buku</label>
                <input type="text" name="judulBuku" id="judulBuku" class="w-full mt-1 p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="isbn" class="block text-gray-700">ISBN</label>
                <input type="text" name="isbn" id="isbn" class="w-full mt-1 p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="jumlah_buku" class="block text-gray-700">Jumlah Buku</label>
                <input type="number" name="jumlah_buku" id="jumlah_buku" class="w-full mt-1 p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="tanggalPenyerahan" class="block text-gray-700">Tanggal Penyerahan</label>
                <input type="date" name="tanggalPenyerahan" id="tanggalPenyerahan" class="w-full mt-1 p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Sumbang
                </button>
            </div>
        </form>
    </div>
@endsection

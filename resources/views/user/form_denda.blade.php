@extends('user.dashboard')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-4">Form Pembayaran Denda</h1>
    <form action=" {{ route('denda.submitPelunasanDenda') }}" method="POST">
        @csrf
        <input type="hidden" name="idDenda" value="{{ $denda->idDenda }}">

        <!-- Rincian Denda -->
        <div class="mb-4">
            <h2 class="text-xl font-bold mb-2">Rincian Denda</h2>
            <div class="mb-2">
                <p>Judul Buku: {{ $denda->peminjaman->buku->judulBuku }}</p>
            </div>
            <div class="mb-2">
                <p>Total Hari Telat: {{ $denda->totalDenda/2000 }} hari</p>
            </div>
            <div class="mb-2">
                <p>Denda per Hari: Rp {{ number_format(2000, 0, ',', '.') }}</p>
            </div>
            <div class="mb-2">
                <p>Total Denda: Rp {{ number_format($denda->totalDenda, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Metode Pembayaran -->
        <div class="mb-4">
            <label for="metode_pembayaran" class="block text-sm font-bold mb-2">Metode Pembayaran:</label>
            <select id="metode_pembayaran" name="metode_pembayaran" class="border border-gray-400 p-2 w-full" required>
                @foreach($metodePembayaranOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Submit Pembayaran Denda</button>
        </div>
    </form>
</div>
@endsection
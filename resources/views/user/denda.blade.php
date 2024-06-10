@extends('user.dashboard')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Daftar Denda</h1>

        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-md text-gray-700 bg-gray-50 ">
                    <tr>
                        <th class="px-6 py-3">Judul Buku</th>
                        <th class="px-6 py-3">Jumlah Hari Telat</th>
                        <th class="px-6 py-3">Total Denda</th>
                        <th class="px-6 py-3">Tanggal Bayar Denda</th>
                        <th class="px-6 py-3">Status Denda</th>
                        <th class="px-6 py-3">Metode Pembayaran</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dendaItems as $denda)
                        <tr class="bg-white border-b   hover:bg-gray-100 ">
                            <td class="px-6 py-4">{{ $denda->peminjaman->buku->judulBuku }}</td>
                            <td class="px-6 py-4">
                                {{ ($denda->totalDenda)/2000 }} hari
                            </td>
                            <td class="px-6 py-4">Rp {{ number_format($denda->totalDenda, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">{{ $denda->tanggalBayarDenda ? \Carbon\Carbon::parse($denda->tanggalBayarDenda)->format('d F Y') : '-' }}</td>
                            <td class="px-6 py-4">{{ $denda->statusDenda }}</td>
                            <td class="px-6 py-4">{{ $denda->metodePembayaran ?? '-' }}</td>
                            <td class="px-6 py-4">
                                @if ($denda->statusDenda == 'Belum Lunas')
                                <a href="{{ route('denda.showFormDenda', $denda->idDenda) }}" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Bayar Sekarang</a>
                                @elseif ($denda->statusDenda == 'Tunggu Konfirmasi')
                                <span class="text-blue-400 font-bold">Menunggu Konfirmasi</span>
                                @elseif ($denda->statusDenda == 'Lunas')
                                    <span class="text-green-600">Lunas</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

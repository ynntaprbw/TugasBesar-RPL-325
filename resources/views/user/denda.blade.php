@extends('user.dashboard')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Daftar Denda</h1>

        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Judul Buku</th>
                        <th class="px-4 py-2">Jumlah Hari Telat</th>
                        <th class="px-4 py-2">Total Denda</th>
                        <th class="px-4 py-2">Tanggal Bayar Denda</th>
                        <th class="px-4 py-2">Status Denda</th>
                        <th class="px-4 py-2">Metode Pembayaran</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dendaItems as $denda)
                        <tr>
                            <td class="border px-4 py-2">{{ $denda->peminjaman->buku->judulBuku }}</td>
                            <td class="border px-4 py-2">
                                {{ ($denda->totalDenda)/2000 }} hari
                            </td>
                            <td class="border px-4 py-2">Rp {{ number_format($denda->totalDenda, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2">{{ $denda->tanggalBayarDenda ? \Carbon\Carbon::parse($denda->tanggalBayarDenda)->format('d F Y') : '-' }}</td>
                            <td class="border px-4 py-2">{{ $denda->statusDenda }}</td>
                            <td class="border px-4 py-2">{{ $denda->metodePembayaran ?? '-' }}</td>
                            <td class="border px-4 py-2">
                                @if ($denda->statusDenda == 'Belum Lunas')
                                <a href="{{ route('denda.showFormDenda', $denda->idDenda) }}" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Bayar Sekarang</a>
                                @elseif ($denda->statusDenda == 'Tunggu Konfirmasi')
                                <span class="text-yellow-600">Menunggu Konfirmasi</span>
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

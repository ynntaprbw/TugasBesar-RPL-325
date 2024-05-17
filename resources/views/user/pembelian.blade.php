@extends('user.dashboard')

@section('content')

<div class="overflow-x-auto">
    <table class="table-auto w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Judul Buku</th>
                <th class="px-4 py-2">Tanggal Pembayaran</th>
                <th class="px-4 py-2">Total Bayar</th>
                <th class="px-4 py-2">Metode Pembayaran</th>
                <th class="px-4 py-2">Status Pembayaran</th>
                <th class="px-4 py-2">Status Pengambilan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelianItems as $index => $pembelian)
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $pembelian->judulBuku }}</td>
                    <td class="border px-4 py-2">{{ $pembelian->tanggalPembayaran->format('d F Y') }}</td>
                    <td class="border px-4 py-2">{{ $pembelian->total_bayar }}</td>
                    <td class="border px-4 py-2">{{ $pembelian->metodePembayaran }}</td>
                    <td class="border px-4 py-2">{{ $pembelian->statusPembayaran }}</td>
                    <td class="border px-4 py-2">{{ $pembelian->statusPengambilan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

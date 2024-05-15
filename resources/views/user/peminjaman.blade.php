@extends('user.dashboard')

@section('content')

<div class="overflow-x-auto">
    <table class="table-auto w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Judul Buku</th>
                <th class="px-4 py-2">Tanggal Peminjaman</th>
                <th class="px-4 py-2">Batas Pengembalian</th>
                <th class="px-4 py-2">Durasi Peminjaman</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjamanItems as $index => $peminjaman)
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $peminjaman->judulBuku }}</td>
                    <td class="border px-4 py-2">{{ $peminjaman->tanggalPeminjaman }}</td>
                    <td class="border px-4 py-2">{{ $peminjaman->batasPengembalian }}</td>
                    <td class="border px-4 py-2">{{ $peminjaman->durasiPeminjaman }} hari</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
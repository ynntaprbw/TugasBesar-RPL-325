@extends('user.dashboard')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Pengembalian Buku</h1>

        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Judul Buku</th>
                        <th class="px-4 py-2">Tanggal Pengembalian</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengembalianItems as $peminjaman)
                        <tr>
                            <td class="border px-4 py-2">{{ $peminjaman->buku->judulBuku }}</td>
                            <td class="border px-4 py-2">{{ $peminjaman->tanggalPengembalian->format('d F Y') }}</td>
                            <td class="border px-4 py-2">
                                @if ($peminjaman->tanggalPengembalian->greaterThan($peminjaman->batasPengembalian))
                                    Telat
                                @else
                                    Tepat Waktu
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                <a href="#" class="btn btn-primary">Ulasan</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

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
                            <td class="border px-4 py-2">{{ $peminjaman->statusPeminjaman }}</td>
                            <td class="border px-4 py-2">
                                
                                @if ($peminjaman->konfirmasi)
                                    <span class="text-green-600">Dikonfirmasi</span>
                                @else
                                    @if ($peminjaman->tanggalPengembalian->greaterThan($peminjaman->batasPengembalian))
                                        <form method="POST" action="{{ route('denda.tambahDenda') }}">
                                            @csrf
                                            <input type="hidden" name="idPeminjaman" value="{{ $peminjaman->idPeminjaman }}">
                                            <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Konfirmasi</button>
                                        </form>
                                    @endif
                                @endif
                                <a href="#" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ulasan</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

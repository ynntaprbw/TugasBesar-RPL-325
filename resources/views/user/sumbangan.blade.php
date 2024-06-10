@extends('user.dashboard')

@section('content')
    <div class="container mx-auto py-8">
        <div class="mb-4">
            <a href="{{ route('sumbangan.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Sumbang Buku
            </a>
        </div>
        <h1 class="text-3xl font-bold mb-4">Daftar Sumbangan</h1>

        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Judul Buku</th>
                        <th class="px-4 py-2">ISBN</th>
                        <th class="px-4 py-2">Jumlah Buku</th>
                        <th class="px-4 py-2">Tanggal Sumbangan</th>
                        <th class="px-4 py-2">Tanggal Penyerahan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sumbanganItems as $sumbangan)
                        <tr>
                            <td class="border px-4 py-2">{{ $sumbangan->buku->judulBuku }}</td>
                            <td class="border px-4 py-2">{{ $sumbangan->buku->isbn }}</td>
                            <td class="border px-4 py-2">{{ $sumbangan->jumlah_buku }}</td>
                            <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($sumbangan->tanggalSumbangan)->format('d F Y') }}</td>
                            <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($sumbangan->tanggalPenyerahan)->format('d F Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

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
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Bahasa</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sumbanganItems as $sumbangan)
                        <tr>
                            <td class="border px-4 py-2">{{ $sumbangan->judulBuku }}</td>
                            <td class="border px-4 py-2">{{ $sumbangan->bahasa }}</td>
                            <td class="border px-4 py-2">{{ $sumbangan->kategori->namaKategori }}</td>
                            <td class="border px-4 py-2">{{ $sumbangan->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

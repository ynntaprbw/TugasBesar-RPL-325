@extends('user.dashboard')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Keranjang Belanja</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($keranjangItems->count() > 0)
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">Produk</th>
                            <th class="px-4 py-2">Harga</th>
                            <th class="px-4 py-2">Kuantitas</th>
                            <th class="px-4 py-2">Total</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keranjangItems as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item->buku->judulBuku }}</td>
                                <td class="border px-4 py-2">Rp{{ number_format($item->buku->harga, 2, ',', '.') }}</td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('keranjang.update', $item->idKeranjang) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex items-center content-center">
                                            <button type="submit" name="quantity" value="{{ $item->jumlah_buku - 1 }}" class="btn btn-sm btn-secondary">-</button>
                                            <span class="w-16 rounded-md px-2 py-1 text-center">{{ $item->jumlah_buku }}</span>
                                            <button type="submit" name="quantity" value="{{ $item->jumlah_buku + 1 }}" class="btn btn-sm btn-secondary">+</button>
                                        </div>
                                    </form>
                                </td>
                                <td class="border px-4 py-2">Rp{{ number_format($item->total_harga, 2, ',', '.') }}</td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('keranjang.destroy', $item->idKeranjang) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600">Keranjang belanja masih kosong.</p>
        @endif
    </div>
@endsection

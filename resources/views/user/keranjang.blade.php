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

        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2"></th> <!-- Kolom centang -->
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
                                <td class="border px-4 py-2">
                                    <input type="checkbox" name="selected_buku[]" value="{{ $item->idKeranjang }}" class="form-checkbox h-5 w-5 text-green-500">
                                </td> <!-- Kolom centang -->
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
            <div class="flex mt-4">
                <button type="submit" name="action" value="pinjam" class="btn btn-primary mr-2">Pinjam Buku</button>
                <button type="submit" name="action" value="beli" class="btn btn-primary">Beli Buku</button>
            </div>
        </form>
    </div>
@endsection

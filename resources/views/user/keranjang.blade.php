@extends('user.dashboard')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4 mx-8">Keranjang Belanja</h1>

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

        <form action="{{ route('checkout') }}" method="POST" class=" m-8">
            @csrf
            <div class="overflow-x-auto">
                <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 jus"></th>
                                <th scope="col" class="px-16 py-3">
                                    <span class="sr-only">Foto Buku</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Judul Buku
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jumlah
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tindakan
                                </th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach ($keranjangItems as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            {{-- Checkbox --}}
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input type="checkbox" name="selected_buku[]" value="{{ $item->idKeranjang }}" class="form-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                            </td>
                            {{-- Foto buku --}}
                            <td class="p-4">
                                <img src="{{ $item->buku->fotoSampul }}" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple Watch">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $item->buku->judulBuku }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                Rp{{ number_format($item->buku->harga, 2, ',', '.') }}
                            </td>
                            <td class="px-4 py-2">
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
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                Rp{{ number_format($item->total_harga, 2, ',', '.') }}
                            </td>

                            <td class="px-6 py-4">
                                <form action="{{ route('keranjang.destroy', $item->idKeranjang) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                                </form>
                            </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex m-4">
                <button type="submit" name="action" value="pinjam" class="transition duration-150 ease-in-out btn btn-primary mr-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105">Pinjam Buku</button>
                <button type="submit" name="action" value="beli" class="transition duration-150 ease-in-out btn btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105">Beli Buku</button>
            </div>
        </form>
    </div>
@endsection

{{-- <script>
    // Aktifkan/nonaktifkan input tersembunyi berdasarkan status kotak centang
    document.querySelectorAll('input[name="selected_buku[]"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var hiddenInput = this.parentNode.querySelector('input[name="selected_buku_ids[]"]');
            hiddenInput.disabled = this.checked;
        });
    });
</script> --}}

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
    var selectedBukuInput = event.currentTarget.querySelector('input[name="selected_buku"]');
    var selectedBuku = Array.from(event.currentTarget.querySelectorAll('input[name="selected_buku"]:checked'))
        .map(function(checkbox) {
            return checkbox.value;
        }).join(',');

    selectedBukuInput.value = selectedBuku;
});
</script>

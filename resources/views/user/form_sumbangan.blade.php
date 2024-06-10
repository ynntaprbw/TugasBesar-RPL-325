@extends('user.dashboard')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Form Sumbang Buku</h1>
        
        <form action="{{ route('sumbangan.store') }}" method="POST">
        @csrf
        <div>
            <label for="judulBuku">Judul Buku:</label>
            <input type="text" id="judulBuku" name="judulBuku" value="{{ old('judulBuku') }}">
            @error('judulBuku')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="bahasa">Bahasa:</label>
            <input type="text" id="bahasa" name="bahasa" value="{{ old('bahasa') }}">
            @error('bahasa')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="kategori">Kategori:</label>
            <select id="kategori" name="kategori">
                @foreach($categories as $category)
                    <option value="{{ $category->idKategori }}">{{ $category->namaKategori }}</option>
                @endforeach
            </select>
            @error('kategori')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
    </div>
@endsection

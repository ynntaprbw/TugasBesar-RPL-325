<!-- resources/views/artikel/index.blade.php -->

@extends('user.dashboard')

@section('content')
    <div class="container">
        <h1>Artikel</h1>
        <div class="row">
            @foreach ($articles as $artikel)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $artikel->thumbnail }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $artikel->judulArtikel }}</h5>
                            <p class="card-text">Ditulis oleh: {{ $artikel->user->name }}</p>
                            <p class="card-text">Sumber: {{ $artikel->sumberArtikel }}</p>
                            <a href="#" class="btn btn-primary">Baca Artikel</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

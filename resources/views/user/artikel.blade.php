@extends('user.dashboard')
@section('content')
<div class="grid grid-cols-4 gap-4">
    @foreach($articles as $artikel)
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700">
        <img src="{{ $artikel->thumbnail }}" class="card-img-top" alt="...">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">{{ $artikel->judulArtikel }}</h5>
        </a>
        <p class="text-black my-2">Sumber: {{ $artikel->sumberArtikel }}</p>
        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Baca Sekarang
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
    @endforeach
</div>
@endsection

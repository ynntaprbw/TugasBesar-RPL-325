@extends('user.dashboard')
@section('content')
<div class="grid grid-cols-4 gap-4">
    @foreach($ulasans as $ulasan)
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700">
        <p>User: <span class="text-blue-700 font-bold">{{$ulasan->name}}</span></p>
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">{{ $ulasan->komentar }}</h5>
        </a>
        <p class="text-xl">Rating: <span class="text-blue-700 font-bold">{{ $ulasan->rating }}</span></p>
        <p class="text-black my-2">Tanggal: {{ $ulasan->tanggalUlasan }}</p>

    </div>
    @endforeach
</div>
@endsection

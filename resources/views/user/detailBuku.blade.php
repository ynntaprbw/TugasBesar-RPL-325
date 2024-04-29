@extends('user.dashboard')
@section('content')
<div class="">
    @foreach($ulasans as $ulasan)
    <div class="bg-white shadow-md rounded-lg p-4">
        <div class="flex items-center">
            {{-- <div class="flex-shrink-0">
                <img class="h-12 w-12 rounded-full" src="{{ $ulasan->user->profile_photo_url }}" alt="{{ $ulasan->users->namaLengkap }}">
            </div> --}}
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">{{ $ulasan->namaLengkap }}</div>
                <div class="text-sm font-small text-gray-900">{{ date('d M Y', strtotime($ulasan->tanggalUlasan)) }}</div>
            </div>
        </div>
        <div class="mt-2">
            <p class="text-sm text-gray-500">
                Nama Buku: {{ $ulasan->judulBuku }}
            </p>
        </div>
        <div class="mt-2">
            <p class="text-sm text-gray-500">
                {{ $ulasan->komentar }}
            </p>
        </div>
        <div class="mt-2">
            <p class="text-sm text-gray-500">
                Rating: {{ $ulasan->rating }}
            </p>
        </div>
    </div>
    @endforeach
</div>
@endsection

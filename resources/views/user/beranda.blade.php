@extends('user.dashboard')
@section('content')
<div>
    <h1 class="text-3xl">Haloo, <span class="font-bold">{{ Auth::user()->namaLengkap }}</span> selamat datang di <span class="font-bold text-green-950">Libratur</span> !</h1>
</div>
@endsection

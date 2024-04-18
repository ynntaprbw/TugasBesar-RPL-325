<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="https://img.icons8.com/material-rounded/24/user.png" type="image/x-icon">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="flex justify-center items-center min-h-screen">
            <div class="w-full max-w-md">
                <h1 class="text-4xl text-center mb-8">Selamat datang di perpustakaan kami</h1>
                @if(Auth::check())
                    <a href="{{ route('logout') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Logout</a>
                @endif
                    {{-- <div class="flex items-center justify-between">
                    @if(Auth::check())
                        <p>Selamat datang, {{ Auth::user()->name }}</p>
                        <a href="{{ route('logout') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Logout</a>
                    @else
                        <a href="{{ route('sesiRegister') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Registrasi</a>
                        <a href="{{ route('sesiLogin') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</a>
                    @endif
                </div> --}}
            </div>
        </div>
    </div>
</body>
</html>

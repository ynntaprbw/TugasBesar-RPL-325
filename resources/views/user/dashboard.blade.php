<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="https://img.icons8.com/material-rounded/24/user.png" type="image/x-icon">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel="stylesheet" href="./resources/css/app.css">
</head>
<body class="bg-gray-100">
    <nav class="fixed top-0 w-full bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            {{-- Logo --}}
            <a href="{{ route('beranda') }}" class="flex items-center space-x-3">
                <i class="fi-sr-book scale-125"></i>
                <span class="text-2xl font-bold text-green-950">Libratur</span>
            </a>
            {{-- Menu --}}
            <div class="flex items-center space-x-3">
                <ul class="flex items-center space-x-3">
                    <li>
                        <a href="{{ route('beranda') }}" class="{{ request()->is('beranda') ? 'bg-indigo-600 text-white' : '' }} flex items-center p-2 text-gray-500 rounded-lg hover:text-white hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="relative" x-data="{ isOpen: false }" id="dropdown">
                        <button @click="isOpen = !isOpen" aria-haspopup="true" class="{{ request()->is('ulasan') ? 'bg-indigo-600 text-white' : '' }} flex items-center p-2 text-gray-500 rounded-lg hover:text-white hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                            <span>Layanan</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <ul x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 hidden bg-white border border-gray-200 py-1 mt-2 rounded-lg" id="dropdown-menu">
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Peminjaman Buku</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Pengembalian Buku</a></li>
                            <li><a href="{{ route('ulasan') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Ulasan Buku</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Pelunasan Denda</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Pembelian Buku</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Sumbangan Buku</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="{{ request()->is('#') ? 'bg-indigo-600 text-white' : '' }} flex items-center p-2 text-gray-500 rounded-lg hover:text-white hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                            <span>Komunitas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('artikel') }}" class="{{ request()->is('artikel') ? 'bg-indigo-600 text-white' : '' }} flex items-center p-2 text-gray-500 rounded-lg hover:text-white hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                            <span>Artikel</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="flex items-center p-2 text-white hover:text-white rounded-lg dark:bg-red-500 hover:bg-red-600 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-white group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4"/>
                                <path d="M13.5 10.5a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318"/>
                                <path d="M7.589 16.411l4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699"/>
                            </svg>
                            <span class="ml-2">Logout</span>
                        </a>
                    </li>
                </ul>
                <div class="flex items-center space-x-3">
                    <div class="flex space-x-5 p-3 bg-indigo-500 rounded-md">
                        <i class="fi fi-br-user scale-110 text-white"></i>
                        <h2 class="font-bold text-white">{{ Auth::user()->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="container mx-auto px-4 py-8 my-24">
        @yield('content')
    </div>

    <script>
        document.addEventListener('click', function (event) {
            var isClickInside = document.getElementById('dropdown').contains(event.target);
            if (!isClickInside) {
                document.getElementById('dropdown-menu').classList.add('hidden');
            }
        });

        document.getElementById('dropdown').addEventListener('click', function () {
            document.getElementById('dropdown-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>

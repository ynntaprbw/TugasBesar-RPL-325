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
                            <li><a href="{{ route('peminjaman') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Peminjaman Buku</a></li>
                            <li><a href="{{ route('pengembalian') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Pengembalian Buku</a></li>
                            <li><a href="{{ route('ulasan') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Ulasan Buku</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Pelunasan Denda</a></li>
                            <li><a href="{{ route('pembelian') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Pembelian Buku</a></li>
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
                        <a href="{{ route('keranjang') }}" class="{{ request()->is('keranjang') ? 'bg-indigo-600 text-white' : '' }} flex items-center p-2 text-gray-500 rounded-lg hover:text-white hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                            <span>Keranjang</span>
                        </a>
                    </li>
                </ul>
                <div class="flex items-center space-x-3 relative">
                    <div id="dropdownButton" class="flex space-x-5 p-3 bg-indigo-500 rounded-md cursor-pointer hover:scale-105">
                        <i class="fi fi-br-user scale-110 text-white"></i>
                        <h2 class="font-bold text-white">{{ Auth::user()->name }}</h2>
                    </div>
                    <div id="dropdownMenu" class="absolute left-0 mt-24 w-36 items-center bg-red-500 hover:bg-red-400 rounded-md shadow-lg hidden">
                        <ul class="p-3">
                            <li>
                                <a href="{{ route('logout') }}" class="block text-sm text-white">Logout</a>
                            </li>
                        </ul>
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

        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdownMenu = document.getElementById('dropdownMenu');

            dropdownButton.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });

            // Menutup dropdown jika klik di luar dropdown
            window.addEventListener('click', function(e) {
                if (!dropdownButton.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });

    </script>
</body>
</html>

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
    {{-- Navigation --}}
    <div class="fixed inset-0">
        {{-- Navbar --}}
        <nav class="sticky bg-white border-gray-200 w-full ">
            <div class="mx-10 flex flex-wrap  justify-between  py-4 ">
                <a href="{{ route('beranda') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <i class= "fi-sr-book scale-125"></i>
                    <span class="self-center text-2xl font-bold whitespace-nowrap text-green-950">Libratur</span>
                </a>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <div class="flex space-x-5 p-3 bg-indigo-500 rounded-md">
                        <i class="fi fi-br-user scale-110 text-white"></i>
                        <h2 class="font-bold text-white">{{ Auth::user()->namaLengkap }}</h2>
                    </div>
                </div>
            </div>
        </nav>

        {{-- SIDEBAR --}}
        <aside id="default-sidebar" class="top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 md:relative md:translate-x-0 md:w-16 lg:w-32 xl:w-64" aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-white">
                <ul class="space-y-2 font-medium">
                    <!-- Sidebar content -->
                    <div class="h-full px-3 py-4 overflow-y-auto bg-white">
                        <ul class="space-y-2 font-medium">
                            {{-- Sidebar items --}}
                            <li class="">
                                <a href="{{ route('beranda') }}" class="{{request()->is('beranda')? 'bg-indigo-600 text-white' : ''}} flex items-center p-2 text-gray-500 rounded-lg hover:text-white  hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                                <i    class="fi-sr-home w-5 h-5 transition duration-75"></i>
                                <span class="ms-3 transition duration-75">Beranda</span>
                                </a>
                            </li>
                            {{-- Keranjang --}}
                            <li class="">
                                <a href="#" class="{{request()->is('#')? 'bg-indigo-600 text-white' : ''}} flex items-center p-2 text-gray-500 rounded-lg hover:text-white  hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                                <i  class="  fi-sr-shopping-cart w-5 h-5 transition duration-75"></i>
                                <span class="ms-3 transition duration-75">Keranjang</span>
                                </a>
                            </li>
                            {{-- Peminjaman Buku --}}
                            <li class="">
                                <a href="#" class="{{request()->is('#')? 'bg-indigo-600 text-white' : ''}} flex items-center p-2 text-gray-500 rounded-lg hover:text-white  hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                                <i  class="  fi-sr-book-bookmark w-5 h-5 transition duration-75"></i>
                                <span class="ms-3 transition duration-75">Peminjaman Buku</span>
                                </a>
                            </li>
                            {{-- Pengembalian Buku --}}
                            <li class="">
                                <a href="#" class="{{request()->is('#')? 'bg-indigo-600 text-white' : ''}} flex items-center p-2 text-gray-500 rounded-lg hover:text-white  hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                                <i   class=" fi-sr-reservation-table w-5 h-5 transition duration-75"></i>
                                <span class="ms-3 transition duration-75">Pengembalian Buku</span>
                                </a>
                            </li>
                            {{-- Ulasan Buku --}}
                            <li class="">
                                <a href="{{ route('ulasan') }}" class="{{request()->is('ulasan')? 'bg-indigo-600 text-white' : ''}} flex items-center p-2 text-gray-500 rounded-lg hover:text-white  hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                                <i  class="  fi-sr-comment-alt w-5 h-5 transition duration-75"></i>
                                <span class="ms-3 transition duration-75">Ulasan Buku</span>
                                </a>
                            </li>
                            {{-- Pelunasan Denda --}}
                            <li class="">
                                <a href="#" class="{{request()->is('#')? 'bg-indigo-600 text-white' : ''}} flex items-center p-2 text-gray-500 rounded-lg hover:text-white  hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                                <i  class="  fi-sr-wallet w-5 h-5 transition duration-75"></i>
                                <span class="ms-3 transition duration-75">Pelunasan Denda</span>
                                </a>
                            </li>
                            {{-- Pembelian Buku --}}
                            <li class="">
                                <a href="#" class="{{request()->is('#')? 'bg-indigo-600 text-white' : ''}} flex items-center p-2 text-gray-500 rounded-lg hover:text-white  hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                                <i  class="  fi-sr-shop w-5 h-5 transition duration-75"></i>
                                <span class="ms-3 transition duration-75">Pembelian Buku</span>
                                </a>
                            </li>
                            {{-- Sumbangan Buku --}}
                            <li class="">
                                <a href="#" class="{{request()->is('#')? 'bg-indigo-600 text-white' : ''}} flex items-center p-2 text-gray-500 rounded-lg hover:text-white  hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                                <i  class="  fi-sr-hand-holding-heart w-5 h-5 transition duration-75"></i>
                                <span class="ms-3 transition duration-75">Sumbangan Buku</span>
                                </a>
                            </li>
                            {{-- Komunitas --}}
                            <li class="">
                                <a href="#" class="{{request()->is('#')? 'bg-indigo-600 text-white' : ''}} flex items-center p-2 text-gray-500 rounded-lg hover:text-white  hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                                <i  class="  fi-sr-users-alt w-5 h-5 transition duration-75"></i>
                                <span class="ms-3 transition duration-75">Komunitas</span>
                                </a>
                            </li>
                            {{-- Artikel --}}
                            <li class="">
                                <a href="{{ route('artikel') }}" class="{{request()->is('artikel')? 'bg-indigo-600 text-white' : ''}} flex items-center p-2 text-gray-500 rounded-lg hover:text-white  hover:bg-gray-100 dark:hover:bg-indigo-600 group">
                                <i  class="  fi-sr-newspaper w-5 h-5 transition duration-75"></i>
                                <span class="ms-3 transition duration-75">Artikel</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}" class="flex items-center p-2 text-white hover:text-white rounded-lg dark:bg-red-500  hover:bg-red-600  group">
                                <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-white group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                                    <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                                    <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                                </svg>
                                <span class="flex-1 ms-3 transition duration-75 whitespace-nowrap">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </aside>
    </div>

    {{-- Main Content --}}
    <div class="p-4 sm:ml-64 mt-20 z-50 relative">
        @yield('content')
    </div>
</body>
</html>

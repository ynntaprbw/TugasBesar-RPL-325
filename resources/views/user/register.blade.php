<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="https://img.icons8.com/material-rounded/24/user.png" type="image/x-icon">
</head>
<body class="flex justify-center items-center bg-gradient-to-r from-blue-600 to-purple-700 h-screen">
    {{-- Container --}}
    <div class="rounded-lg bg-white p-6 md:p-12 shadow-lg max-w-xl w-full">
        <h1 class="text-center text-2xl font-bold mb-6">Registrasi Akun</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf <!-- CSRF Token -->
            {{-- Nama --}}
            <div class="mb-5">
                <label for="z" class="block mb-2 text-sm font-medium text-black">
                    Nama Lengkap
                </label>
                <input type="text"
                        :value="old('nama')"
                        name="nama"
                        id="nama"
                        class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Lengkap" required autofocus autocomplete="nama" />
            </div>
            {{-- Email --}}
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-black">
                    Email
                </label>
                <input type="email"
                        name="email"
                        id="email"
                        :value="old('email')"
                        class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@flowbite.com" required autocomplete />
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                {{-- Password --}}
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-black">
                        Password
                    </label>
                    <input type="password"
                            name="password"
                            id="password"
                            class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>
                {{-- Confirm Password --}}
                <div class="mb-5">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-black">
                        Konfirmasi Password
                    </label>
                    <input type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>
            </div>
            {{-- @if ($errors->has('password'))
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50  dark:text-red-400 dark:border-red-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Konfirmasi Password tidak sesuai!</span>
                    </div>
                </div>
            @endif --}}

            <div>
                <p>
                    Gunakan minimal 8 karakter dengan campuran huruf, angka & simbol
                </p>
            </div>
            <div class="my-8">
                <p class="text-center">
                    Dengan mendaftar akun di Libratur, kamu telah menyetujui
                    <span class="font-bold text-indigo-700">Aturan Penggunaan</span> dan <span class="font-bold text-indigo-700">Kebijakan Privasi</span>
                </p>
            </div>
            {{-- Button --}}
            <div class="my-8 flex items-center justify-between">
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Daftar
                </button>
            </div>
            {{-- Nanti di link ge login page --}}
            <div>
                <p class="text-center">
                    Sudah punya akun? <a class="text-indigo-700" href="{{ route('login') }}">Masuk</a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>

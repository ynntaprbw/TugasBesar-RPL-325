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
                <label for="namaLengkap" class="block mb-2 text-sm font-medium text-black">
                    Nama Lengkap
                </label>
                <input type="text" 
                        :value="old('namaLengkap')" 
                        name="namaLengkap" 
                        id="namaLengkap" 
                        class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Lengkap" required autofocus autocomplete="namaLengkap" />
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

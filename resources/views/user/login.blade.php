<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="https://img.icons8.com/material-rounded/24/user.png" type="image/x-icon">
</head>
<body class=" bg-gradient-to-r from-blue-600 to-purple-700">
    <div class="container mx-auto px-4 ">
        <div class="flex justify-center items-center min-h-screen">
            {{-- @if(Session()->has("success"))
                <div class="alert alert-success">
                    {{session()->get("success")}}
                </div>
            @endif
            @if(Session()->has("error"))
                <div class="alert alert-error">
                    {{session()->get("error")}}
                </div>
            @endif --}}
            <div class="w-full max-w-md">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route("login")}}">
                    @csrf
                    <h1 class="text-center text-2xl font-bold mb-6">Login Akun</h1>
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-black" for="email">
                            Email
                        </label>
                        <input class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                id="email"
                                name="email"
                                :value="old('email')" placeholder="Email" autofocus required>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black" for="password">
                            Password
                        </label>
                        <input class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        name="password"
                        id="password"
                        type="password" placeholder="******************" required>
                    </div>
                    {{-- ALERT --}}
                    @if($errors->has("email") || $errors->has("password"))
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 bg-white dark:text-red-400 dark:border-red-800" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Peringatan! Email atau Password yang anda masukkan salah!</span> 
                            </div>
                        </div>
                    @endif
                    {{-- End Of ALert --}}
                    <div class="my-8 flex items-center justify-between">
                        <button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="submit" type="submit">
                            Sign In
                        </button>
                    </div>
                    <div>
                        <p class="text-center">
                            Belum punya akun? <a class="text-indigo-700" href="{{ route('register') }}">Registrasi Sekarang</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

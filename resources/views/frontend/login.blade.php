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
            <div class="w-full max-w-md">
                <form class="rounded-lg bg-white shadow-md px-8 pt-6 pb-8 mb-4" method="POST" action="/sesi/login">
                    @csrf
                    <h1 class="text-center text-2xl font-bold mb-6">Login Akun</h1>
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-black" for="email">
                            Email
                        </label>
                        <input class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ Session::get('email') }}" placeholder="Email" required>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black" for="password">
                            Password
                        </label>
                        <input class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="password" type="password" placeholder="******************" required>
                    </div>
                    <div class="my-8 flex items-center justify-between">
                        <button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="submit" type="submit">
                            Sign In
                        </button>
                    </div>
                    <div>
                        <p class="text-center">
                            Belum punya akun? <a class="text-indigo-700" href="{{ route('sesiRegister') }}">Registrasi Sekarang</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

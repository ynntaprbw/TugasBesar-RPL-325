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
                <h1 class="text-4xl text-center mb-8">
                    Selamat datang di perpustakaan kami
                </h1>
                <div class="flex items-center justify-between">
                    <p>Selamat datang, <strong>{{ Auth::user()->namaLengkap }}</strong></p>
                    <a href="{{ route('logout') }}" class="text-red-500 hover:text-red-700">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

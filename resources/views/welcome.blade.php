<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Librartur - Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900">

    <section class="bg-cover bg-center bg-no-repeat h-screen flex flex-col justify-center items-center relative overflow-hidden"
             style="background-image: url('https://www.law.georgetown.edu/environmental-law-review/wp-content/uploads/sites/18/2023/10/Photo-in-a-realistic-style_-Inside-the-renowned-New-York-Public-Library-the-vast-shelves-tell-a-different-tale.-Fewer-books-are-seen-and-in-their-pl-1-1-980x552.jpg');">
        <div class="absolute inset-0 bg-black opacity-50 z-0"></div>
        <div class="relative z-10 text-center text-white">
            <h1 class="mb-4 text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none">Selamat Datang di Aplikasi Kami</h1>
            <p class="mb-8 text-lg md:text-xl font-normal text-gray-300 px-6 md:px-12 lg:px-24">Silakan login atau daftar untuk melanjutkan</p>
            <div class="flex justify-center items-center">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Register</a>
                    @endif
                @endif
            </div>
        </div>
    </section>

</body>
</html>

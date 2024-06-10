<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Librartur - Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-slate-900">


    <section class="bg-center bg-no-repeat bg-[url('https://t3.ftcdn.net/jpg/06/76/98/70/360_F_676987000_E2MmZqzNy39Ec9PSRW0k7IyOfGtj0IXX.jpg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Selamat Datang di Aplikasi Kami</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Silakan login atau daftar untuk melanjutkan</p>
            @if (Route::has('login'))
                <div class="flex justify-center items-center mt-4">
                    <a
                        href="{{ route('login') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                        >
                            Register
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </section>
</body>
</html>

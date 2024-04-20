<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-slate-900">
    <div class="container mx-auto px-4 h-screen  ">
        <div class="grid justify-center items-center h-full">
            <div class="flex justify-center  items-center ">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-white">Selamat Datang di Aplikasi Kami</h1>
                    <p class="text-lg text-gray-300 mt-4">Silakan login atau daftar untuk melanjutkan</p>
                </div>
            </div>
    
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
</body>
</html>

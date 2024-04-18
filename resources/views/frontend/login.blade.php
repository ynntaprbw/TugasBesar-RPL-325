<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="https://img.icons8.com/material-rounded/24/user.png" type="image/x-icon">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="flex justify-center items-center min-h-screen">
            @if(Session()->has("success"))
                <div class="alert alert-success">
                    {{session()->get("success")}}
                </div>
            @endif
            @if(Session()->has("error"))
                <div class="alert alert-error">
                    {{session()->get("error")}}
                </div>
            @endif
            <div class="w-full max-w-md">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route("register")}}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" value="{{ Session::get('email') }}" placeholder="Email">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="submit" type="submit">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

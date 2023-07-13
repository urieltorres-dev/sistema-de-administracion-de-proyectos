<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
            crossorigin="anonymous">
    <style>
        .login{
            background: url('{{asset('img/11.jpg')}}') no-repeat center center fixed;
        }
    </style>
    <title>Register</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body class="h-screen font-sans login bg-cover">
<div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
        <div class="leading-loose">
            <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <p class="text-gray-800 font-medium">Crea una cuenta</p>
                <div class="">
                    <label class="block text-sm text-gray-00" for="name">Nombre</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded
                    @error('name')
                        border-red-500
                    @enderror"
                    value="{{old('name')}}" id="name" name="name" type="text" required="" placeholder="Nombre" aria-label="Name">
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="">
                    <label class="block text-sm text-gray-00" for="lastname">Apellido</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded
                    @error('lastname')
                        border-red-500
                    @enderror"
                    value="{{old('lastname')}}" id="lastname" name="lastname" type="text" required="" placeholder="Apellido" aria-label="Lastname">
                    @error('lastname')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mt-2">
                    <label class="block text-sm text-gray-00" for="email">Correo electrónico</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded
                    @error('email')
                        border-red-500
                    @enderror"
                    value="{{old('email')}}" id="email" name="email" type="email" required="" placeholder="Correo electrónico" aria-label="Email">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mt-2">
                    <label class=" block text-sm text-gray-00" for="password">Contraseña</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded
                    @error('password')
                        border-red-500
                    @enderror"
                    id="password" name="password" type="password" required="" placeholder="Contraseña" aria-label="Email">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mt-2">
                    <label class=" block text-sm text-gray-00" for="password_confirmation">Repite tu contraseña</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded
                    @error('password_confirmation')
                        border-red-500
                    @enderror"
                    id="password_confirmation" name="password_confirmation" type="password" required="" placeholder="Repite tu contraseña" aria-label="Email">
                    @error('password_confirmation')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mt-4">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Registrarse</button>
                </div>

                <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800" href="{{route('login')}}">
                    Iniciar sesión
                </a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

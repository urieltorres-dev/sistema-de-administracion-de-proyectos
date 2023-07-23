<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>
        
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        @yield('styles')

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <link rel="stylesheet" href="{{asset('css/all.css')}}">

        <!-- Insertar script de sweetalert2 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.min.css" integrity="sha512-yX1R8uWi11xPfY7HDg7rkLL/9F1jq8Hyiz8qF4DV2nedX4IVl7ruR2+h3TFceHIcT5Oq7ooKi09UZbI39B7ylw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="">
        <!--Container -->
        <div class="mx-auto bg-grey-400">
            <!--Screen-->
            <div class="min-h-screen flex flex-col">
                <!--Header Section Starts Here-->
                <header class="bg-nav">
                    <div class="flex justify-between">
                        <div class="p-1 mx-3 inline-flex items-center">
                            <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                            <h1 class="text-white p-2">Administración de proyectos</h1>
                        </div>
                        <div class="p-1 flex flex-row items-center">
                            <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="{{asset('img/usuario.svg')}}" alt="{{auth()->user()->name . ' ' . auth()->user()->lastname}}">
                            <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">
                                {{auth()->user()->name . ' ' . auth()->user()->lastname}}
                            </a>
                            <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                                <ul class="list-reset">
                                <li><hr class="border-t mx-2 border-grey-ligght"></li>
                                <li><form method="POST" action="{{route('logout')}}">
                                        @csrf
                                        <button type="submit" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">
                                            Cerrar secion
                                        </button>
                                    </form>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>
                <!--/Header-->

                <div class="flex flex-1">
                    <!--Sidebar-->
                    <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                        <ul class="list-reset flex flex-col">
                            <li class=" w-full h-full py-3 px-2 border-b border-light-border">
                                <a href="{{route('dashboard')}}"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    <i class="fas fa-tachometer-alt float-left mx-2"></i>
                                    Dashboard
                                    <span><i class="fas fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            @if (auth()->user()->usertype == 'admin')
                            <li class="w-full h-full py-3 px-2 border-b border-light-border">
                                <a href="{{route('clients')}}"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    <i class="fab fa-wpforms float-left mx-2"></i>
                                    Clientes
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            @endif
                            @if (auth()->user()->usertype == 'admin')
                            <li class="w-full h-full py-3 px-2 border-b border-light-border">
                                <a href="{{route('collaborators')}}"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    <i class="fab fa-wpforms float-left mx-2"></i>
                                    Colaboradores
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            @endif
                            <li class="w-full h-full py-3 px-2 border-b border-light-border">
                                <a href="{{route('projects')}}"
                                    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    <i class="fas fa-table float-left mx-2"></i>
                                    Proyectos
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </aside>
                    <!--/Sidebar-->
                    <!--Main-->
                    <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                        @yield('contenido')

                    </main>
                    <!--/Main-->
                </div>
                <!--Footer-->
                <footer class="bg-grey-darkest text-white p-2">
                    <div class="flex flex-1 mx-auto">&copy; Derechos reservados {{now()->year}}</div>
                </footer>
                <!--/footer-->
            </div>
        </div>
        <script src="{{asset('js/main.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.min.js" integrity="sha512-JbRQ4jMeFl9Iem8w6WYJDcWQYNCEHP/LpOA11LaqnbJgDV6Y8oNB9Fx5Ekc5O37SwhgnNJdmnasdwiEdvMjW2Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        @yield('scripts')

        @if (session('error'))
        <script>
        Swal.fire({
            title: '¡Error!',
            text: 'Ha ocurrido un error.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
        </script>
        @endif
    </body>
</html>

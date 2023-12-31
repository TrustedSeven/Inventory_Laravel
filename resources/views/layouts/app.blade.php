<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>General Data Center</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/tablefilter.js') }}"></script>
    <script src="{{ asset('js/tf-1-2aa33b10e0e549020c12.js') }}"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tablefilter.css') }}" rel="stylesheet">
    <style>
        .myLoader {
            position: absolute;
            padding: 5px;
            margin: 100px 0 0 5%;
            width: auto;
            z-index: 1000;
            font-size: 12px;
            font-weight: bold;
            border: 1px solid #666;
            background: #ffffcc;
            vertical-align: middle;
        }

        .myStatus {
            width: auto;
            display: block;
        }
    </style>
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-gray-600 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                    <b>G</b>eneral<b>D</b>ata<b>C</b>enter
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    @if (Auth::check())
                    <a class="no-underline hover:underline" href="/inventory">Manage Inventory</a>
                    <a class="no-underline hover:underline" href="/users">Manage Users</a>
                    @endif
                    @guest
                    <a class="no-underline hover:underline" href="{{ route('login') }}"><button class="bg-white hover:bg-blue-500 text-gray-900 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Login</button></a>
                    @if (Route::has('register'))
                    <a class="no-underline hover:underline" href="{{ route('register') }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Register</button></a>
                    @endif
                    @else
                    <button><span class="text-gray-100 underline">{{ Auth::user()->name }}</span></button>

                    <a href="{{ route('logout') }}" class="no-underline hover:underline" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Log out</button></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                    @endguest
                </nav>
            </div>
        </header>


        <div>
            @yield('content')
        </div>

        <div>
            <!-- @include('layouts.footer') -->
        </div>
    </div>
</body>

</html>

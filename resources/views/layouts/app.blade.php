<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inventaris') }}</title>

    <!-- Fonts & Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">
    <div id="app" class="flex-grow">
        <!-- Navbar -->
        <nav class="bg-white border-b shadow-sm">
            <div class="container mx-auto px-4 md:px-8 py-3 flex justify-between items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">
                    {{ config('app.name', 'Inventaris') }}
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-6 items-center">
                    @auth
                        <a href="{{ route('home') }}" class="hover:text-blue-600">Dashboard</a>
                        <a href="{{ route('barang.index') }}" class="hover:text-blue-600">Barang</a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 hover:underline">
                                Logout ({{ Auth::user()->name }})
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="hover:text-blue-600">Register</a>
                        @endif
                    @endauth
                </div>

                <!-- Mobile Toggle Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden px-4 pb-4 space-y-2">
                @auth
                    <a href="{{ route('home') }}" class="block hover:text-blue-600">Dashboard</a>
                    <a href="{{ route('barang.index') }}" class="block hover:text-blue-600">Barang</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline">
                            Logout ({{ Auth::user()->name }})
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block hover:text-blue-600">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block hover:text-blue-600">Register</a>
                    @endif
                @endauth
            </div>
        </nav>

        <!-- Content -->
        <main class="py-6 px-4 md:px-8">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t text-center text-sm text-gray-600 py-4">
        &copy; {{ date('Y') }} By Genta Awaludin Ismail
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        document.getElementById('mobile-menu-button')?.addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            if (menu) menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>

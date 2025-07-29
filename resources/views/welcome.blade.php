<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Selamat Datang</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">


    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #1f2937;
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            max-width: 1490px;
            margin: 0 auto;
            width: 100%;
            padding: 0 10px;
        }

        .navbar {
            background-color: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
        }

        .navbar-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            flex-wrap: wrap;
        }

        .logo {
            font-family: 'Nunito', sans-serif;
            font-weight: 800;
            font-size: 20px;
            color: #2563eb;
        }


        .links a,
        .links form button {
            margin-left: 20px;
            text-decoration: none;
            color: #000000;
            font-weight: 600;
            font-size: 16px;
            background: none;
            border: none;
            cursor: pointer;
        }

        .hero {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px 20px;
        }

        .title {
            font-size: 64px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 40px;
            color: #2563eb;
        }

        .footer {
            background-color: #f3f4f6;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
        }

        @media (max-width: 768px) {
            .title {
                font-size: 40px;
            }

            .subtitle {
                font-size: 20px;
            }

            .navbar-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .links {
                margin-top: 10px;
                width: 100%;
            }

            .links a,
            .links form button {
                margin: 5px 10px 0 0;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="container navbar-inner">
            <div class="logo">Inventaris</div>
            <div class="links">
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ url('/barang') }}">Barang</a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit">Logout ({{ Auth::user()->name }})</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <div class="title">Selamat Datang</div>
        <div class="subtitle">Di Sistem Manajemen Inventaris Berbasis Laravel 7</div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; {{ date('Y') }} By Genta Awaludin Ismail
    </div>
</body>

</html>

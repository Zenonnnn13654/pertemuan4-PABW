<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ParkTrack')</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #0B0E17;
            color: white;
        }

        header, footer {
            background: #151A2D;
            padding: 20px;
            text-align: center;
        }

        nav {
            background: #1C233D;
            padding: 15px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        nav a {
            color: #00E0FF;
            text-decoration: none;
        }

        main {
            padding: 25px;
            min-height: 60vh;
        }

        .card {
            background: #1C233D;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>ParkTrack</h1>
        <p>Sistem Pengarahan Parkir Cerdas</p>
    </header>

    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('info') }}">Info Parkir</a>
        <a href="{{ route('reservasi.form') }}">Reservasi</a>
        <a href="{{ route('status') }}">Status</a>
        <a href="{{ route('pembayaran') }}">Pembayaran</a>
        <a href="{{ route('denda') }}">Denda</a>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} ParkTrack</p>
    </footer>
</body>
</html>
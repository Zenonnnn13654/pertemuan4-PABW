<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'LaporBanjir - BPBD')</title>

    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }
        header {
            background: #075985;
            color: white;
            padding: 22px 8%;
        }
        nav {
            background: #0c4a6e;
            padding: 14px 8%;
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
        }
        nav a { color: white; text-decoration: none; }
        nav a:hover { text-decoration: underline; }
        main {
            max-width: 900px;
            min-height: 65vh;
            margin: 30px auto;
            padding: 0 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            padding: 22px;
            margin-bottom: 18px;
            box-shadow: 0 2px 8px #00000010;
        }
        input, button {
            width: 100%;
            padding: 11px;
            margin-top: 7px;
            margin-bottom: 15px;
        }
        button {
            background: #0284c7;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }
        .Waspada { background: #dcfce7; color: #166534; }
        .Siaga { background: #fef3c7; color: #92400e; }
        .Awas { background: #fee2e2; color: #991b1b; }
        .alert {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 7px;
            margin-bottom: 18px;
        }
        .error { color: #dc2626; font-size: 14px; }
        footer {
            text-align: center;
            background: #0c4a6e;
            color: white;
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>LaporBanjir</h1>
        <p>Sistem Pelaporan Banjir BPBD Kabupaten Bandung</p>
    </header>

    <nav>
        <a href="{{ route('banjir.form') }}">Form Pelaporan</a>
        <a href="{{ route('banjir.daftar') }}">Daftar Laporan</a>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} BPBD Kabupaten Bandung
    </footer>
</body>
</html>
```
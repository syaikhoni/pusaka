<!DOCTYPE html>
<html>

<head>
    <title>PUSAKA</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            background: #f4f6f8;
            color: #111827;
        }

        .navbar {
            background: white;
            padding: 16px 25px;
            display: flex;
            align-items: center;
            gap: 18px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        .navbar b {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: #2563eb;
        }

        .navbar a {
            color: #374151;
            text-decoration: none;
            font-weight: 500;
        }

        .navbar a:hover {
            color: #2563eb;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 30px 25px;
        }

        .dashboard-header {
            background: white;
            padding: 25px;
            border-radius: 18px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .dashboard-header h1 {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-size: 34px;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .stat-card h2 {
            margin: 0;
            font-size: 32px;
            color: #2563eb;
        }

        .stat-card p {
            margin: 8px 0 0;
            color: #4b5563;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .card h2 {
            margin-top: 0;
        }

        .card p {
            color: #4b5563;
            line-height: 1.6;
        }

        .card a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th {
            background: #1f2937;
            color: white;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        button,
        .btn {
            background: #2563eb;
            color: white;
            padding: 8px 14px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
        }

        button:hover,
        .btn:hover {
            background: #1d4ed8;
        }

        .logout-btn {
            background: #ef4444;
        }

        @media (max-width: 768px) {

            .stat-grid,
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .navbar {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <b>PUSAKA</b>

        <a href="/">Beranda</a>
        <a href="/prosedur">Prosedur</a>
        <a href="/daftar-online">Daftar Naskah</a>
        <a href="/cek-status">Cek Status</a>
        <a href="/publikasi">Publikasi</a>

        @auth
            <a href="/admin/dashboard">Dashboard</a>

            <form action="/logout" method="POST" style="display:inline;">
                @csrf
                <button class="logout-btn" type="submit">Logout</button>
            </form>
        @else
            <a href="/login">Login Admin</a>
        @endauth
    </div>

    <div class="container">
        @yield('content')
    </div>

</body>

</html>

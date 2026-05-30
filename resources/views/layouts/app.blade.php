<!DOCTYPE html>
<html>
<head>
    <title>PUSAKA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            margin: 0;
            background: radial-gradient(circle at top, rgba(37, 99, 235, 0.12), transparent 30%), #f4f6f8;
            color: #111827;
        }
        .navbar {
            background: rgba(255, 255, 255, 0.92);
            color: #111827;
            padding: 18px 25px;
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            box-shadow: 0 2px 12px rgba(15, 23, 42, 0.05);
            border-bottom: 1px solid rgba(15, 23, 42, 0.06);
        }
        .navbar b {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            letter-spacing: -0.02em;
            font-weight: 700;
            color: #667eea;
        }
        .navbar a {
            color: #4b5563;
            margin-right: 15px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            letter-spacing: 0.02em;
            transition: color 0.3s ease;
        }
        .navbar a:hover {
            color: #667eea;
        }
        .container {
            padding: 30px 25px;
            max-width: 1080px;
            margin: 0 auto;
        }
        .dashboard-header {
            margin-bottom: 28px;
            padding: 24px;
            background: white;
            border-radius: 22px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
        }
        .dashboard-header h1 {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            letter-spacing: -0.03em;
            font-weight: 700;
        }
        .dashboard-header p {
            margin: 12px 0 0;
            color: #4b5563;
            line-height: 1.7;
            max-width: 680px;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }
        .card {
            background: white;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 16px 40px rgba(15, 23, 42, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            min-height: 180px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 48px rgba(15, 23, 42, 0.12);
        }
        .card h2 {
            margin: 0 0 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 1.15rem;
            font-weight: 600;
            color: #111827;
        }
        .card p {
            margin: 0;
            color: #4b5563;
            line-height: 1.7;
            flex-grow: 1;
        }
        .card a {
            display: inline-flex;
            align-items: center;
            margin-top: 18px;
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }
        .card a:hover {
            text-decoration: underline;
        }
        table {
            background: white;
            border-collapse: collapse;
            width: 100%;
        }
        th {
            background: #1f2937;
            color: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button, .btn {
            background: #2563eb;
            color: white;
            padding: 8px 12px;
            border: none;
            text-decoration: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover, .btn:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>

<div class="navbar">

    <b>PUSAKA</b>

    <a href="/">Beranda</a>
    <a href="/daftar-online">Daftar Naskah</a>
    <a href="/cek-status">Cek Status</a>
    <a href="/publikasi">Publikasi</a>

    @auth
        @if(auth()->user()->role == 'admin')

            <a href="/admin/dashboard">Dashboard Admin</a>

            <form action="/logout" method="POST" style="display:inline;">
                @csrf
                <button
                    style="
                        background:#ef4444;
                        color:white;
                        border:none;
                        padding:8px 15px;
                        border-radius:8px;
                        cursor:pointer;
                    ">
                    Logout
                </button>
            </form>

        @endif
    @else
        <a href="/login">Login Admin</a>
    @endauth

</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>
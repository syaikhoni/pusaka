
<x-guest-layout>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
        }

        .login-page {
            width: 100%;
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            background:
                linear-gradient(rgba(15, 23, 42, 0.65),
                    rgba(15, 23, 42, 0.65)),
                url('/images/bg-login.jpg');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .login-card {
            width: 100%;
            max-width: 450px;

            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);

            border-radius: 20px;
            padding: 35px;

            box-shadow: 0 20px 50px rgba(0, 0, 0, .25);
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo h1 {
            color: #2563eb;
            font-size: 38px;
            font-weight: 800;
        }

        .logo p {
            color: #64748b;
            margin-top: 8px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;

            background: #2563eb;
            color: white;

            font-size: 16px;
            font-weight: 700;

            cursor: pointer;
        }

        .btn-login:hover {
            background: #1d4ed8;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #64748b;
            font-size: 13px;
        }
    </style>

    <div class="login-page">

        <div class="login-card">

            <div class="logo">
                <h1>PUSAKA</h1>
                <p>
                    Sistem Seleksi dan Publikasi Naskah Penulis
                </p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label>Email</label>

                    <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label>Password</label>

                    <input type="password" name="password" required>
                </div>

                <button type="submit" class="btn-login">
                    Masuk
                </button>

                <div class="footer">
                    © {{ date('Y') }} PUSAKA
                </div>

            </form>

        </div>

    </div>

</x-guest-layout>
```

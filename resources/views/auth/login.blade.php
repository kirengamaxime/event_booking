<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #020617, #0f172a);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            color: white;
        }

        .auth-card {
            width: 100%;
            max-width: 400px;
            background: #111827;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        }

        .form-control {
            background: #1f2937;
            border: none;
            color: white;
        }

        .form-control:focus {
            background: #1f2937;
            box-shadow: none;
            border: 1px solid #22c55e;
        }

        .btn-login {
            background: #22c55e;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            font-weight: bold;
        }

        .btn-login:hover {
            background: #16a34a;
        }

        a {
            color: #22c55e;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="auth-card">

    <h4 class="mb-4 text-center">Login</h4>
    @if ($errors->any())
    <div style="color:red; margin-bottom:10px;">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn-login">Login</button>
    </form>

    <p class="mt-3 text-center">
        Don't have an account?
        <a href="{{ route('register') }}">Register</a>
    </p>

</div>

</body>
</html>
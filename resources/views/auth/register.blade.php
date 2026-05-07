<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

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
        }

        .form-control {
            background: #1f2937;
            border: none;
            color: white;
        }

        .btn-register {
            background: #3b82f6;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            font-weight: bold;
        }

        .btn-register:hover {
            background: #2563eb;
        }
    </style>
</head>

<body>

<div class="auth-card">

    <h4 class="mb-4 text-center">Create Account</h4>

   <form method="POST" action="{{ secure_url('/register') }}">
        @csrf

        <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Confirm Password" required>

        <button class="btn-register">Register</button>
    </form>

</div>

</body>
</html>
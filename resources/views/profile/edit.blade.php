<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: linear-gradient(135deg, #0f172a, #020617);
            color: white;
            font-family: 'Segoe UI', sans-serif;
        }

        .container-box {
            max-width: 800px;
            margin: auto;
            margin-top: 40px;
        }

        .card-dark {
            background: #0f172a;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 25px;
            border: 1px solid rgba(255,255,255,0.05);
        }

        .form-control {
            background: #020617;
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
        }

        .form-control:focus {
            background: #020617;
            color: white;
            border-color: #2563eb;
            box-shadow: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            border: none;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            border: none;
        }
    </style>
</head>

<body>

<div class="container-box">

    <h2 class="mb-4">👤 Profile Settings</h2>

    <!-- UPDATE PROFILE -->
    <div class="card-dark">
        <h5>Update Profile</h5>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <input type="text" name="name"
                   value="{{ auth()->user()->name }}"
                   class="form-control mb-3" required>

            <input type="email" name="email"
                   value="{{ auth()->user()->email }}"
                   class="form-control mb-3" required>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>

    <!-- DELETE ACCOUNT -->
    <div class="card-dark">
        <h5 class="text-danger">Delete Account</h5>

        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger"
                    onclick="return confirm('Are you sure?')">
                Delete Account
            </button>
        </form>
    </div>

    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">
        ← Back
    </a>

</div>

</body>
</html>
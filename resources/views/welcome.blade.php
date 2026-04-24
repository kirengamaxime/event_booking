<!DOCTYPE html>
<html>
<head>
    <title>EventBooking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        /* HERO */
       .hero {
    height: 100vh;
    background: 
        linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)),
        url('/images/bg1.png');
        
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;

    animation: zoomBg 20s infinite alternate ease-in-out;
}

@keyframes zoomBg {
    0% {
        background-size: 100%;
    }
    100% {
        background-size: 110%;
    }
}

        .btn-main {
            background: linear-gradient(135deg, #ff7b00, #ffb347);
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            color: white;
            font-weight: 600;
        }

        .section {
            padding: 80px 0;
        }

        .card-custom {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .card-custom:hover {
            transform: translateY(-5px);
        }

        .footer {
            background: #111;
            color: white;
            padding: 40px 0;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand fw-bold">EventBooking</a>

    <div>
        <a href="/login" class="btn btn-outline-light me-2">Login</a>
        <a href="/register" class="btn btn-warning">Register</a>
    </div>
</nav>

<!-- HERO -->
<div class="hero">
    <div>
        <h1>Discover & Book Amazing Events</h1>
        <p>Concerts • Conferences • Sports • Parties</p>
        <a href="/events" class="btn btn-main mt-3">Explore Events</a>
    </div>
</div>

<!-- ABOUT -->
<div class="section text-center bg-light">
    <div class="container">
        <h2 class="mb-4">About Us</h2>
        <p class="text-muted">
            We help you discover and book the best events around you.
            From tech conferences to concerts and sports events — everything in one place.
        </p>
    </div>
</div>

<!-- FEATURES -->
<div class="section">
    <div class="container text-center">
        <h2 class="mb-5">Why Choose Us?</h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card p-4 card-custom">
                    <h5>⚡ Fast Booking</h5>
                    <p>Book tickets in seconds with a simple process.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 card-custom">
                    <h5>🔒 Secure Payments</h5>
                    <p>Safe and trusted payment system.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 card-custom">
                    <h5>Best Events</h5>
                    <p>Carefully selected events for you.</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- SAMPLE EVENTS -->
<div class="section bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Popular Events</h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card card-custom">
                    <img src="/images/v.png" height="200" style="object-fit:cover;">
                    <div class="p-3">
                        <h5>Volleyball Match</h5>
                        <p class="text-muted">BK Arena</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom">
                    <img src="/images/y.png" height="200" style="object-fit:cover;">
                    <div class="p-3">
                        <h5>Morning Yoga</h5>
                        <p class="text-muted">Nyandungu Park</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom">
                    <img src="/images/t.png" height="200" style="object-fit:cover;">
                    <div class="p-3">
                        <h5>Tech Conference</h5>
                        <p class="text-muted">Kigali Convention Centre</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- CONTACT -->
<div class="section text-center">
    <div class="container">
        <h2>Contact Us</h2>
        <p>Email: support@eventbooking.com</p>
        <p>Phone: +250 700 000 000</p>
    </div>
</div>

<!-- FOOTER -->
<div class="footer text-center">
    <p>© 2026 EventBooking. All rights reserved.</p>
</div>

</body>
</html>
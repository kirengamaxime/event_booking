<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Booking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #1d2671, #00c6ff);
    color: white;
}

/* NAVBAR */
.navbar {
    background: rgba(0,0,0,0.3);
    backdrop-filter: blur(10px);
}

/* HERO */
.hero {
    height: 90vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 20px;
}

.hero h1 {
    font-size: 48px;
    font-weight: 800;
}

.hero p {
    font-size: 18px;
    margin-top: 10px;
    color: #e0e0e0;
}

/* BUTTON */
.btn-main {
    margin-top: 25px;
    padding: 14px 30px;
    border-radius: 30px;
    background: linear-gradient(135deg, #ff7a18, #ffb347);
    color: white;
    font-weight: bold;
    border: none;
    transition: 0.3s;
}

.btn-main:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(255,122,24,0.4);
}

/* ABOUT SECTION */
.about-box {
    background: white;
    color: #333;
    max-width: 900px;
    margin: -80px auto 40px;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 15px 50px rgba(0,0,0,0.2);
}
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg px-4">
    <a class="navbar-brand text-white fw-bold">EventBooking</a>

    <div class="ms-auto">
        <a href="/login" class="btn btn-sm btn-outline-light me-2">Login</a>
        <a href="/register" class="btn btn-sm btn-warning">Register</a>
    </div>
</nav>

<div class="hero">
    <h1>Discover & Book Amazing Events</h1>
    <p>From conferences to fun activities — everything in one place 🎉</p>

    <a href="/events" class="btn-main">
        Explore Events
    </a>
</div>

<div class="about-box">
    <h3 class="mb-3">Why Choose Us?</h3>
    <p>
        We make event booking simple, fast, and secure. Whether you're looking for
        tech conferences, concerts, or social meetups — we’ve got you covered.
    </p>
</div>
</html>
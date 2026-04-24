<!DOCTYPE html>
<html>
<head>
    <title>{{ $event->title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

body {
    background: #0f172a;
    color: white;
    font-family: 'Segoe UI', sans-serif;
}

/* HERO */
.hero {
    position: relative;
    height: 400px;
    overflow: hidden;
}

/* BACKGROUND IMAGE */
.hero-bg {
    position: absolute;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    filter: brightness(0.5);
}

/* DARK GRADIENT */
.hero-bg::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(to top, rgba(15,23,42,1), transparent);
}

/* TEXT */
.hero-content {
    position: relative;
    z-index: 2;
    padding: 60px;
}

.hero h1 {
    font-size: 42px;
    font-weight: bold;
}

.hero p {
    opacity: 0.85;
    font-size: 16px;
}

/* MAIN CARD */
.card-modern {
    background: #1e293b;
    border-radius: 20px;
    padding: 25px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.5);
}

/* INFO GRID */
.info-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
}

.info-box {
    background: #0f172a;
    padding: 15px;
    border-radius: 12px;
    text-align: center;
}

.info-box small {
    color: #94a3b8;
}

/* PROGRESS */
.progress {
    height: 12px;
    border-radius: 10px;
    overflow: hidden;
}

.progress-bar {
    background: linear-gradient(90deg, #22c55e, #4ade80);
}

/* BOOKING CARD */
.booking-card {
    background: #111827;
    border-radius: 20px;
    padding: 25px;
}

/* INPUTS */
input {
    background: #1e293b !important;
    border: none !important;
    color: white !important;
}

input::placeholder {
    color: #94a3b8;
}

/* TICKETS */
.ticket {
    padding: 15px;
    border-radius: 12px;
    background: #1e293b;
    text-align: center;
    cursor: pointer;
    border: 2px solid transparent;
    transition: 0.3s;
}

.ticket:hover {
    transform: translateY(-4px);
}

.ticket input {
    display: none;
}

.ticket.active {
    border: 2px solid #22c55e;
    background: rgba(34,197,94,0.2);
}

/* BUTTON */
.btn-book {
    background: linear-gradient(135deg, #3b82f6, #6366f1);
    border: none;
    padding: 14px;
    border-radius: 12px;
    font-weight: bold;
    width: 100%;
    transition: 0.3s;
}

.btn-book:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(59,130,246,0.5);
}

/* ATTENDEES */
.attendee {
    background: #1e293b;
    padding: 10px;
    border-radius: 10px;
    margin-bottom: 10px;
}

    </style>
</head>

<body>

<!-- HERO -->
@php
    $title = strtolower($event->title);

    if ($event->image) {
        $image = asset('storage/'.$event->image);
    } elseif (str_contains($title, 'volleyball')) {
        $image = asset('images/v.png');
    } elseif (str_contains($title, 'yoga')) {
        $image = asset('images/y.png');
    } elseif (str_contains($title, 'tech')) {
        $image = asset('images/t.png');
    } else {
        $image = asset('images/default.png');
    }
@endphp

<div class="hero">

    <div class="hero-bg" style="background-image: url('{{ $image }}');"></div>

    <div class="hero-content">
        <h1>{{ $event->title }}</h1>
        <p>{{ $event->location }} • {{ $event->date }}</p>
    </div>

</div>

<div class="container mt-5">

    @php
        $current = $event->bookings->count();
        $max = $event->max_attendees;
        $remaining = $max - $current;
        $percentage = ($max > 0) ? ($current / $max) * 100 : 0;
    @endphp

    <div class="row g-4">

        <!-- LEFT -->
        <div class="col-md-8">

            <div class="card-modern mb-4">

                <h4>Description</h4>
                <p style="color:#cbd5f5">{{ $event->description }}</p>

                <hr>

                <div class="info-grid">

                    <div class="info-box">
                        <h5>{{ $max }}</h5>
                        <small>Max</small>
                    </div>

                    <div class="info-box">
                        <h5>{{ $current }}</h5>
                        <small>Booked</small>
                    </div>

                    <div class="info-box">
                        <h5>{{ $remaining }}</h5>
                        <small>Remaining</small>
                    </div>

                </div>

                <div class="mt-4">
                    <div class="progress">
                        <div class="progress-bar" style="width: {{ $percentage }}%"></div>
                    </div>
                </div>

            </div>

            <!-- ATTENDEES -->
            @auth
            @if(auth()->user()->role === 'admin')
            <div class="card-modern">

                <h4>Attendees</h4>

                @foreach($event->bookings as $a)
                    <div class="attendee">
                        {{ $a->name }}
                    </div>
                @endforeach

            </div>
            @endif
            @endauth

        </div>

        <!-- RIGHT -->
        <div class="col-md-4">

            <div class="booking-card">

                <h4 class="mb-3">🎟 Book Ticket</h4>

                @if($remaining > 0)

                <form method="POST" action="{{ route('bookings.store') }}">
                    @csrf

                    <input type="hidden" name="event_id" value="{{ $event->id }}">

                    <input type="text" name="name" placeholder="Your Name" class="form-control mb-3" required>

                    <input type="email" name="email" placeholder="Email Address" class="form-control mb-3" required>

                    <div class="d-flex gap-2 mb-3">

                        <label class="ticket w-100">
                            <input type="radio" name="ticket_type" value="regular" required>
                            Regular <br><small>5,000 RWF</small>
                        </label>

                        <label class="ticket w-100">
                            <input type="radio" name="ticket_type" value="vip">
                            VIP <br><small>15,000 RWF</small>
                        </label>

                    </div>

                    <button class="btn-book">Book Now</button>

                </form>

                @else
                    <div class="alert alert-warning">
                        Fully booked 🚫
                    </div>
                @endif

            </div>

        </div>

    </div>

    <!-- BACK -->
    <a href="{{ route('events.index') }}" class="btn btn-light mt-4">
        ← Back
    </a>

</div>

<script>
document.querySelectorAll('.ticket').forEach(card => {
    card.addEventListener('click', () => {
        document.querySelectorAll('.ticket').forEach(c => c.classList.remove('active'));
        card.classList.add('active');
    });
});
</script>

</body>
</html>
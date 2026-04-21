<!DOCTYPE html>
<html>
<head>
    <title>Event Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            min-height: 100vh;
            color: #fff;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .info-label {
            font-weight: 600;
            color: #cfd8dc;
        }

        .attendee-item {
            background: rgba(255,255,255,0.1);
            padding: 10px 15px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .btn-custom {
            border-radius: 10px;
        }

        .progress {
            height: 10px;
            border-radius: 10px;
        }

        input {
            border-radius: 10px !important;
            border: none !important;
            padding: 12px;
        }
        .ticket-card {
    display: block;
    cursor: pointer;
}

.ticket-card input {
    display: none;
}

.ticket-content {
    background: rgba(255,255,255,0.08);
    padding: 15px;
    border-radius: 12px;
    text-align: center;
    transition: 0.3s;
    border: 2px solid transparent;
}

.ticket-content h6 {
    margin: 0;
    font-weight: bold;
}

.ticket-content .price {
    margin: 5px 0 0;
    font-size: 14px;
    color: #ccc;
}

/* HOVER */
.ticket-card:hover .ticket-content {
    transform: translateY(-3px);
    background: rgba(255,255,255,0.15);
}

/* SELECTED */
.ticket-card input:checked + .ticket-content {
    border: 2px solid #28a745;
    background: rgba(40,167,69,0.2);
}

/* VIP STYLE */
.ticket-card.vip input:checked + .ticket-content {
    border: 2px solid gold;
    background: rgba(255,215,0,0.2);
}

.btn-book {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    font-weight: bold;
    font-size: 16px;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

/* Hover effect */
.btn-book:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(40,167,69,0.4);
}

/* Click effect */
.btn-book:active {
    transform: scale(0.98);
}
    </style>
</head>

<body>

<div class="container py-5">

    <!-- ALERTS -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- EVENT CARD -->
    <div class="glass-card mb-4">

        <h2 class="mb-4">{{ $event->title }}</h2>

        <p><span class="info-label">📅 Date:</span> {{ $event->date }}</p>
        <p><span class="info-label">📍 Location:</span> {{ $event->location }}</p>
        <p><span class="info-label">📝 Description:</span> {{ $event->description }}</p>

        <hr>

        @php
            $current = $event->bookings->count();
            $max = $event->max_attendees;
            $remaining = $max - $current;
            $percentage = ($max > 0) ? ($current / $max) * 100 : 0;
        @endphp

        <p><span class="info-label">👥 Max Attendees:</span> {{ $max }}</p>
        <p><span class="info-label">✅ Current Attendees:</span> {{ $current }}</p>
        <p><span class="info-label">🪑 Remaining Seats:</span> {{ $remaining }}</p>

        <!-- PROGRESS BAR -->
        <div class="progress mt-3">
            <div class="progress-bar bg-success" style="width: {{ $percentage }}%"></div>
        </div>

    </div>

    <!-- BOOKING SECTION -->
   <div class="glass-card mb-4">

    <h4 class="section-title">🎟 Book this Event</h4>

    @if($remaining > 0)

        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf

            <!-- EVENT ID -->
            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <!-- NAME -->
            <input 
                type="text" 
                name="name" 
                placeholder="Your Name" 
                class="form-control mb-3"
                required
            >

            <!-- EMAIL -->
            <input 
                type="email" 
                name="email" 
                placeholder="Your Email" 
                class="form-control mb-3"
                required
            >

            <!-- 🎟 TICKET TYPE -->
            <div class="mb-4">
                <label class="form-label fw-bold text-white mb-3">
                    🎟 Choose Ticket Type
                </label>

                <div class="d-flex gap-3">

                    <label class="ticket-card w-100">
                        <input type="radio" name="ticket_type" value="normal" required>
                        <div class="ticket-content">
                            <h6>Regular</h6>
                            <p class="price">5,000 RWF</p>
                        </div>
                    </label>

                    <label class="ticket-card w-100 vip">
                        <input type="radio" name="ticket_type" value="vip">
                        <div class="ticket-content">
                            <h6>VIP</h6>
                            <p class="price">15,000 RWF</p>
                        </div>
                    </label>

                </div>
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn-book">
                🎟 Book Now
            </button>

        </form>

    @else
        <div class="alert alert-warning">
            🚫 Event is fully booked!
        </div>
    @endif

</div>

    
   @auth
@if(auth()->user()->role === 'admin')

<div class="glass-card mb-4">

    <h4 class="section-title">👥 Attendees</h4>

    @if($event->bookings && $event->bookings->count() > 0)
        @foreach($event->bookings as $attendee)
            <div class="attendee-item">
                {{ $attendee->name }}
            </div>
        @endforeach
    @else
        <p>No attendees yet 😢</p>
    @endif

</div>

@endif
@endauth
    </div>

    <!-- BACK BUTTON -->
    <a href="{{ route('events.index') }}" class="btn btn-light btn-custom">
        ← Back to Events
    </a>

</div>

<!-- JS FOR BUTTON ENABLE -->
<script>
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const btn = document.getElementById('bookBtn');

    function checkInputs() {
        btn.disabled = !(nameInput.value.trim() && emailInput.value.trim());
    }

    nameInput.addEventListener('input', checkInputs);
    emailInput.addEventListener('input', checkInputs);
</script>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Events</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

body {
    background: linear-gradient(135deg, #0f172a, #020617);
    color: white;
    font-family: 'Segoe UI', sans-serif;
}

/* HEADER */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
}

/* EVENT CARD */
.event-card {
    background: #0f172a;
    border-radius: 18px;
    overflow: hidden;
    transition: 0.3s;
    border: 1px solid rgba(255,255,255,0.05);
}

.event-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 50px rgba(0,0,0,0.6);
}

/* IMAGE */
.event-image {
    position: relative;
    overflow: hidden;
}

.event-image img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: 0.4s;
}

.event-card:hover img {
    transform: scale(1.1);
}

/* OVERLAY */
.overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 15px;
    background: linear-gradient(transparent, rgba(0,0,0,0.9));
}

.overlay-title {
    font-weight: bold;
    font-size: 16px;
}

/* CONTENT */
.event-content {
    padding: 20px;
}

.event-meta {
    font-size: 14px;
    opacity: 0.7;
    margin-bottom: 6px;
}

/* FOOTER */
.event-footer {
    margin-top: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* BADGE */
.badge-available {
    background: rgba(34,197,94,0.2);
    color: #22c55e;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
}

/* BUTTON */
.btn-view {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    padding: 6px 14px;
    border-radius: 8px;
    color: white;
    text-decoration: none;
    transition: 0.3s;
}

.btn-view:hover {
    background: linear-gradient(135deg, #1d4ed8, #2563eb);
}

/* EMPTY */
.empty {
    text-align: center;
    opacity: 0.7;
    margin-top: 80px;
}

    </style>
</head>

<body>

<div class="container py-5">

    <!-- HEADER -->
    <div class="header">
        <h2 class="fw-bold">🎟 Explore Events</h2>

        <div class="d-flex gap-2">
            @auth
                @if(auth()->user()->role === 'admin')

                    <a href="{{ route('admin.bookings') }}" class="btn btn-success">
                        📊 Dashboard
                    </a>

                    <a href="{{ route('events.create') }}" class="btn btn-primary">
                        + Create Event
                    </a>

                @endif
            @endauth
        </div>
    </div>

    <!-- SUCCESS -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- EVENTS -->
    @if(isset($events) && count($events) > 0)

        <div class="row g-4">

            @foreach($events as $event)
                <div class="col-lg-4 col-md-6">

                    <div class="event-card">

                        @php
                            $title = strtolower($event->title);

                            if (str_contains($title, 'volleyball')) {
                                $image = asset('images/v.png');
                            } elseif (str_contains($title, 'yoga')) {
                                $image = asset('images/y.png');
                            } elseif (str_contains($title, 'tech')) {
                                $image = asset('images/t.png');
                            } else {
                                $image = asset('images/default.png');
                            }
                        @endphp

                        <!-- IMAGE -->
                        <div class="event-image">
                            <img src="{{ $image }}">

                            <!-- OVERLAY TEXT -->
                            <div class="overlay">
                                <div class="overlay-title">
                                    {{ $event->title }}
                                </div>
                            </div>
                        </div>

                        <!-- CONTENT -->
                        <div class="event-content">

                            <div class="event-meta">
                                📅 {{ $event->date }}
                            </div>

                            <div class="event-meta">
                                📍 {{ $event->location }}
                            </div>

                            <div class="event-footer">
                                <span class="badge-available">Available</span>

                                <a href="{{ route('events.show', $event->id) }}" class="btn-view">
                                    View →
                                </a>
                            </div>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    @else

        <div class="empty">
            <h4>No events yet 😢</h4>
            <p>Create your first event to get started</p>
        </div>

    @endif

</div>

</body>
</html>
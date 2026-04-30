<!DOCTYPE html>
<html>
<head>
    <title>Events</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
body {
    margin: 0;
    background: linear-gradient(135deg, #0f172a, #020617);
    color: white;
    font-family: 'Segoe UI', sans-serif;
}

/* LAYOUT */
.app-layout {
    display: flex;
}

/* SIDEBAR */
.sidebar {
    width: 240px;
    min-height: 100vh;
    background: #020617;
    padding: 20px;
    border-right: 1px solid rgba(255,255,255,0.05);
}

.logo {
    color: white;
    margin-bottom: 30px;
    font-weight: bold;
    font-size: 18px;
}

/* MENU */
.menu-item {
    display: block;
    padding: 12px;
    margin-bottom: 10px;
    border-radius: 10px;
    text-decoration: none;
    color: #cbd5f5;
    transition: 0.3s;
}

.menu-item:hover {
    background: rgba(59,130,246,0.2);
    color: white;
}

.menu-item.active {
    background: #2563eb;
    color: white;
}

/* LOGOUT */
.logout-btn {
    width: 100%;
    text-align: left;
    border: none;
    background: transparent;
    color: #f87171;
}

.logout-btn:hover {
    background: rgba(248,113,113,0.2);
}

/* MAIN */
.main-content {
    flex: 1;
    padding: 40px;
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

.event-image img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}

.overlay {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 15px;
    background: linear-gradient(transparent, rgba(0,0,0,0.9));
}

.event-content {
    padding: 20px;
}

.event-meta {
    font-size: 14px;
    opacity: 0.7;
}

.event-footer {
    margin-top: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.badge-available {
    background: rgba(34,197,94,0.2);
    color: #22c55e;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
}

.btn-view {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    padding: 6px 14px;
    border-radius: 8px;
    color: white;
    text-decoration: none;
}

.btn-warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    border: none;
    color: white;
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    border: none;
}
    </style>
</head>

<body>

<div class="app-layout">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo">🎟 Events</div>

        <!-- FIXED LINKS -->
        <a href="{{ route('events.index') }}" 
           class="menu-item {{ request()->routeIs('events.index') ? 'active' : '' }}">
            🏠 Explore Events
        </a>

        <a href="{{ route('bookings.my') }}" 
           class="menu-item {{ request()->routeIs('bookings.my') ? 'active' : '' }}">
            🎟 My Bookings
        </a>

        <!-- 👉 You can later connect this -->
        <a href="#" class="menu-item">
            💳 Payments
        </a>

        <!-- ✅ FIXED PROFILE LINK -->
        <a href="{{ route('profile.edit') }}" 
           class="menu-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">
            👤 Profile
        </a>

        @auth
        <div style="margin-top:20px; font-size:13px; color:#9ca3af;">
            Logged in as <br>
            <strong>{{ auth()->user()->name }}</strong>
        </div>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}" style="margin-top:20px;">
            @csrf
            <button class="menu-item logout-btn">🚪 Logout</button>
        </form>
        @endauth

    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

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

@if(isset($events) && count($events) > 0)
<div class="row g-4">

@foreach($events as $event)
<div class="col-lg-4 col-md-6">
<div class="event-card">
        <!-- EVENTS -->
       @php
    $image = $event->image 
        ? asset('storage/' . $event->image) 
        : asset('images/default.png');
@endphp


                            <div class="event-image position-relative">
                                <img src="{{ $image }}">

                                <div class="overlay">
                                    <strong>{{ $event->title }}</strong>
                                </div>
                            </div>

                            <div class="event-content">

                                <div class="event-meta">
                                    📅 {{ $event->date }}
                                </div>

                                <div class="event-meta">
                                    📍 {{ $event->location }}
                                </div>

                                <div class="event-footer">

                                    <span class="badge-available">Available</span>

                                    <div class="d-flex gap-2">

                                        <a href="{{ route('events.show', $event->id) }}" class="btn-view">
                                            View →
                                        </a>

                                        @auth
                                            @if(auth()->user()->role === 'admin')

                                                <a href="{{ route('events.edit', $event->id) }}" 
                                                   class="btn btn-warning btn-sm">
                                                    ✏
                                                </a>

                                                <form action="{{ route('events.destroy', $event->id) }}" 
                                                      method="POST"
                                                      onsubmit="return confirm('Delete this event?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-danger btn-sm">
                                                        🗑
                                                    </button>
                                                </form>

                                            @endif
                                        @endauth

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        @else

            <div class="text-center mt-5">
                <h4>No events yet 😢</h4>
            </div>

        @endif

    </div>

</div>

</body>
</html>
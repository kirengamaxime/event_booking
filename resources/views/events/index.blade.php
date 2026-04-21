<!DOCTYPE html>
<html>
<head>
    <title>Events</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
body {
    background: linear-gradient(
        rgba(10, 10, 20, 0.85),
        rgba(10, 10, 20, 0.95)
    ),
    url('/images/bg.jpg');

    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: white;
}

.event-card {
    border-radius: 18px;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.1);
    color: white;
    transition: all 0.3s ease;

    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 20px;
}

.event-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.4);
}

.event-title {
    font-weight: 600;
    font-size: 18px;
}

.badge-custom {
    background: rgba(40,167,69,0.2);
    color: #4ade80;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}
    </style>
</head>

<body>

<div class="container py-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🎟 Events</h2>

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
                <div class="col-lg-4 col-md-6 col-sm-12">

                    <div class="card event-card h-100 border-0">

                        <!-- IMAGE -->
                        @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}"
                                 style="width:100%; height:180px; object-fit:cover; border-radius:12px; margin-bottom:10px;">
                        @endif

                        <!-- TITLE -->
                        <div class="event-title mb-2">
                            {{ $event->title }}
                        </div>

                        <!-- DATE -->
                        <div class="mb-2 text-light" style="opacity: 0.8;">
                            📅 {{ $event->date }}
                        </div>

                        <!-- LOCATION -->
                        <div class="text-muted mb-3">
                            📍 {{ $event->location }}
                        </div>

                        <!-- BADGE -->
                        <div class="mb-3">
                            <span class="badge-custom">Available</span>
                        </div>

                        <!-- BUTTONS -->
                        <div class="mt-auto d-flex gap-2">

                            <a href="{{ route('events.show', $event->id) }}"
                               class="btn btn-sm w-100 text-white"
                               style="background:#2563eb;">
                                View
                            </a>

                            @auth
                                @if(auth()->user()->role === 'admin')

                                    <a href="{{ route('events.edit', $event->id) }}"
                                       class="btn btn-sm w-100 text-white"
                                       style="background:#f59e0b;">
                                        Edit
                                    </a>

                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm w-100 text-white" style="background:#ef4444;">
                                            Delete
                                        </button>
                                    </form>

                                @endif
                            @endauth

                        </div>

                    </div>

                </div>
            @endforeach

        </div>
    @else
        <div class="text-center mt-5">
            <h5>No events found 😢</h5>
        </div>
    @endif

</div>

</body>
</html>
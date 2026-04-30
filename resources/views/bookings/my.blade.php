<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
body {
    background: linear-gradient(135deg, #0f172a, #020617);
    color: white;
    font-family: 'Segoe UI', sans-serif;
}

.container {
    max-width: 1000px;
}

.card-booking {
    background: #111827;
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 20px;
    border: 1px solid rgba(255,255,255,0.05);
}

.badge-paid {
    background: rgba(34,197,94,0.2);
    color: #22c55e;
    padding: 5px 10px;
    border-radius: 12px;
    font-size: 12px;
}

.badge-pending {
    background: rgba(234,179,8,0.2);
    color: #eab308;
    padding: 5px 10px;
    border-radius: 12px;
    font-size: 12px;
}

.btn-receipt {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: white;
    border-radius: 8px;
    padding: 6px 12px;
    text-decoration: none;
}
    </style>
</head>

<body>

<div class="container py-5">

    <h2 class="mb-4">🎟 My Bookings</h2>

    @if($bookings->count())

        @foreach($bookings as $booking)

            <div class="card-booking">

                <h5>{{ $booking->event->title }}</h5>

                <p class="mb-1">📅 {{ $booking->event->date }}</p>
                <p class="mb-1">📍 {{ $booking->event->location }}</p>

                <p class="mb-2">
                    🎫 Ticket: <strong>{{ strtoupper($booking->ticket_type) }}</strong>
                </p>

                <p>
                    Status:
                    @if($booking->payment_status == 'paid')
                        <span class="badge-paid">Paid</span>
                    @else
                        <span class="badge-pending">Pending</span>
                    @endif
                </p>

                <div class="d-flex gap-2">

                    <a href="{{ route('events.show', $booking->event->id) }}" class="btn btn-sm btn-light">
                        View Event
                    </a>

                    @if($booking->payment_status == 'paid')
                        <a href="{{ route('receipt.download', $booking->id) }}" class="btn-receipt">
                            Download Receipt
                        </a>
                    @endif

                </div>

            </div>

        @endforeach

    @else

        <div class="text-center mt-5">
            <h5>No bookings yet 😢</h5>
        </div>

    @endif

    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">
        ← Back to Events
    </a>

</div>

</body>
</html>
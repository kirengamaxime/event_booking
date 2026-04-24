<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
body {
    background: linear-gradient(135deg, #020617, #0f172a);
    color: white;
    font-family: 'Segoe UI', sans-serif;
}

/* PAGE TITLE */
.page-title {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 30px;
}

/* LAYOUT */
.payment-wrapper {
    max-width: 1100px;
    margin: auto;
}

/* LEFT INFO CARD */
.info-card {
    background: #1e293b;
    border-radius: 18px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
}

.info-item {
    margin-bottom: 10px;
    color: #cbd5f5;
}

/* RIGHT PAYMENT CARD */
.payment-card {
    background: #111827;
    border-radius: 18px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
}

/* PAYMENT OPTION */
.payment-option {
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 12px;
    padding: 15px;
    margin-bottom: 15px;
    cursor: pointer;
    transition: 0.3s;
    display: flex;
    align-items: center;
    gap: 15px;
}

.payment-option:hover {
    transform: translateY(-3px);
    border-color: #3b82f6;
    background: rgba(59,130,246,0.1);
}

/* ACTIVE */
.payment-option.active {
    border: 2px solid #22c55e;
    background: rgba(34,197,94,0.15);
}

/* HIDE RADIO */
.payment-option input {
    display: none;
}

/* LOGO */
.payment-option img {
    width: 45px;
    height: 45px;
    object-fit: contain;
}

/* TEXT */
.payment-name {
    font-weight: 600;
}

/* BUTTON */
.btn-pay {
    width: 100%;
    margin-top: 20px;
    padding: 14px;
    border: none;
    border-radius: 12px;
    font-weight: bold;
    background: linear-gradient(135deg, #22c55e, #4ade80);
    color: #022c22;
    transition: 0.3s;
}

.btn-pay:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(34,197,94,0.4);
}

/* BACK BUTTON */
.btn-back {
    margin-top: 20px;
    display: inline-block;
    color: #94a3b8;
    text-decoration: none;
}

.btn-back:hover {
    color: white;
}
    </style>
</head>

<body>

<div class="container py-5 payment-wrapper">

    <!-- TITLE -->
    <div class="page-title">
        💳 Complete Your Payment
    </div>

    <div class="row g-4">

        <!-- LEFT SIDE (USER INFO) -->
        <div class="col-md-5">

            <div class="info-card">

                <h5 class="mb-3">Booking Info</h5>

                <div class="info-item">
                    <strong>Name:</strong> {{ $booking->name }}
                </div>

                <div class="info-item">
                    <strong>Email:</strong> {{ $booking->email }}
                </div>

                <div class="info-item">
                    <strong>Ticket:</strong> {{ ucfirst($booking->ticket_type) }}
                </div>

            </div>

        </div>

        <!-- RIGHT SIDE (PAYMENT) -->
        <div class="col-md-7">

            <div class="payment-card">

                <h5 class="mb-4">Choose Payment Method</h5>

                <form method="POST" action="{{ route('payment.process') }}">
                    @csrf
                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                    <!-- MTN -->
                    <label class="payment-option">
                        <input type="radio" name="payment_method" value="mtn" required>
                        <img src="{{ asset('images/mtn.png') }}">
                        <div class="payment-name">MTN MoMo</div>
                    </label>

                    <!-- AIRTEL -->
                    <label class="payment-option">
                        <input type="radio" name="payment_method" value="airtel">
                        <img src="{{ asset('images/airtel.png') }}">
                        <div class="payment-name">Airtel Money</div>
                    </label>

                    <!-- BANK -->
                    <label class="payment-option">
                        <input type="radio" name="payment_method" value="bank">
                        <img src="{{ asset('images/bk.png') }}">
                        <div class="payment-name">Bank of Kigali</div>
                    </label>

                    <button type="submit" class="btn-pay">
                        Pay Now →
                    </button>

                </form>

            </div>

        </div>

    </div>

    <!-- BACK -->
    <a href="{{ route('events.index') }}" class="btn-back">
        ← Back to events
    </a>

</div>

<script>
/* highlight selected option */
document.querySelectorAll('.payment-option').forEach(option => {
    option.addEventListener('click', () => {
        document.querySelectorAll('.payment-option').forEach(o => o.classList.remove('active'));
        option.classList.add('active');
    });
});
</script>

</body>
</html>
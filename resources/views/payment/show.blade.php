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

/* TITLE */
.page-title {
    font-size: 30px;
    font-weight: 700;
    margin-bottom: 30px;
}

/* WRAPPER */
.payment-wrapper {
    max-width: 1100px;
    margin: auto;
}

/* CARDS */
.info-card, .payment-card {
    background: #111827;
    border-radius: 18px;
    padding: 25px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.6);
}

/* INFO TEXT */
.info-item {
    margin-bottom: 12px;
    color: #cbd5f5;
    font-size: 14px;
}

/* PAYMENT OPTION */
.payment-option {
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 14px;
    padding: 15px;
    margin-bottom: 15px;
    cursor: pointer;
    transition: all 0.25s ease;
    display: flex;
    align-items: center;
    gap: 15px;
    position: relative;
}

.payment-option:hover {
    transform: translateY(-4px) scale(1.01);
    border-color: #3b82f6;
    background: rgba(59,130,246,0.12);
}

/* ACTIVE OPTION */
.payment-option.active {
    border: 2px solid #22c55e;
    background: rgba(34,197,94,0.15);
    box-shadow: 0 0 15px rgba(34,197,94,0.3);
}

/* RADIO HIDDEN */
.payment-option input {
    display: none;
}

/* LOGO */
.payment-option img {
    width: 48px;
    height: 48px;
    object-fit: contain;
}

/* TEXT */
.payment-name {
    font-weight: 600;
    font-size: 15px;
}

/* PAY BUTTON */
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
    position: relative;
}

.btn-pay:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(34,197,94,0.4);
}

/* LOADING STATE */
.btn-pay.loading {
    pointer-events: none;
    opacity: 0.7;
}

.btn-pay.loading::after {
    content: "Processing...";
    position: absolute;
    left: 0;
    right: 0;
}

/* BACK */
.btn-back {
    margin-top: 25px;
    display: inline-block;
    color: #94a3b8;
    text-decoration: none;
}

.btn-back:hover {
    color: white;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .page-title {
        text-align: center;
    }
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

        <!-- LEFT -->
        <div class="col-md-5">
            <div class="info-card">
                <h5 class="mb-3">Booking Info</h5>

                <div class="info-item"><strong>Name:</strong> {{ $booking->name }}</div>
                <div class="info-item"><strong>Email:</strong> {{ $booking->email }}</div>
                <div class="info-item"><strong>Ticket:</strong> {{ ucfirst($booking->ticket_type) }}</div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-7">
            <div class="payment-card">

                <h5 class="mb-4">Choose Payment Method</h5>

                <form method="POST" action="{{ route('payment.process') }}" id="paymentForm">
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

                    <button type="submit" class="btn-pay" id="payBtn">
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
// highlight selected option
document.querySelectorAll('.payment-option').forEach(option => {
    option.addEventListener('click', () => {
        document.querySelectorAll('.payment-option').forEach(o => o.classList.remove('active'));
        option.classList.add('active');
        option.querySelector('input').checked = true;
    });
});

// loading state
document.getElementById('paymentForm').addEventListener('submit', function() {
    const btn = document.getElementById('payBtn');
    btn.classList.add('loading');
    btn.innerHTML = "Processing...";
});
</script>

</body>
</html>
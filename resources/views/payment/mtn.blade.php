<!DOCTYPE html>
<html>
<head>
    <title>MTN Payment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
body {
    margin: 0;
    min-height: 100vh;
    background: #0f172a;
    font-family: 'Segoe UI', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

/* CARD */
.payment-card {
    width: 100%;
    max-width: 400px;
    background: #111827;
    border-radius: 16px;
    padding: 30px;
    border: 1px solid rgba(255,255,255,0.05);
}

/* HEADER */
.logo {
    width: 70px;
    margin-bottom: 10px;
}

.title {
    font-size: 20px;
    font-weight: 600;
}

.subtitle {
    font-size: 13px;
    color: #9ca3af;
    margin-bottom: 20px;
}

/* BOOKING INFO */
.booking-box {
    background: #1f2937;
    border-radius: 10px;
    padding: 12px;
    font-size: 14px;
    margin-bottom: 20px;
}

/* INPUT */
.form-label {
    font-size: 13px;
    color: #9ca3af;
    margin-bottom: 6px;
}

.input-group {
    background: #1f2937;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid transparent;
}

.input-group-text {
    background: transparent;
    border: none;
    color: #9ca3af;
    padding-left: 12px;
}

.form-control {
    background: transparent !important;
    border: none !important;
    color: white !important;
}

.form-control::placeholder {
    color: #6b7280;
}

.input-group:focus-within {
    border: 1px solid #22c55e;
}

/* BUTTON */
.btn-pay {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: none;
    background: #22c55e;
    color: white;
    font-weight: 600;
    transition: 0.2s;
    margin-top: 15px;
}

.btn-pay:hover {
    background: #16a34a;
}

/* SMALL TEXT */
.footer-text {
    font-size: 12px;
    color: #6b7280;
    text-align: center;
    margin-top: 15px;
}
    </style>
</head>

<body>

<div class="payment-card text-center">

    <!-- LOGO -->
    <img src="/images/mtn.png" class="logo" alt="MTN">

    <div class="title">MTN MoMo Payment</div>
    <div class="subtitle">Secure mobile payment</div>

    <!-- BOOKING -->
    <div class="booking-box">
        Booking for <strong>{{ $booking->name }}</strong>
    </div>

    <!-- FORM -->
    <form method="POST" action="{{ route('payment.confirm', $booking->id) }}">
        @csrf

        <div class="text-start mb-2">
            <label class="form-label">MTN Number</label>
        </div>

        <div class="input-group">
            <span class="input-group-text">+250</span>
            <input 
                type="tel" 
                name="phone" 
                class="form-control"
                placeholder="78XXXXXXX"
                pattern="7[0-9]{8}"
                required
            >
        </div>

        <button type="submit" class="btn-pay">Pay Now</button>
    </form>

    <div class="footer-text">
        Powered by MTN MoMo
    </div>

</div>

</body>
</html>
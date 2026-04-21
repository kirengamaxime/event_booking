<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .payment-card {
    max-width: 450px;
    margin: auto;
    background: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

.payment-option {
    display: block;
    border: 1px solid #eee;
    border-radius: 12px;
    padding: 15px;
    margin-bottom: 15px;
    cursor: pointer;
    transition: 0.3s;
}

.payment-option:hover {
    border-color: #007bff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.payment-option input {
    display: none;
}

.option-content {
    display: flex;
    align-items: center;
    gap: 15px;
}

.logo {
    width: 40px;
    height: 40px;
    object-fit: contain;
}

.payment-option input:checked + .option-content {
    font-weight: bold;
}

.payment-option input:checked + .option-content::after {
    content: "✔";
    margin-left: auto;
    color: green;
    font-weight: bold;
}

.btn-continue {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #28a745, #218838);
    color: white;
    font-weight: bold;
    transition: 0.3s;
}

.btn-continue:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(40,167,69,0.3);
}
</style>

</head>

<body class="bg-dark text-white">

<div class="container py-5">

    <h2 class="mb-4">💳 Complete Your Payment</h2>

    <div class="card p-4 text-dark">

        <p><strong>Name:</strong> {{ $booking->name }}</p>
        <p><strong>Email:</strong> {{ $booking->email }}</p>

        <hr>

        <div class="payment-card">

    <h4 class="mb-4 text-center">Choose Payment Method</h4>

    <form method="POST" action="{{ route('payment.process') }}">
        @csrf
        <input type="hidden" name="booking_id" value="{{ $booking->id }}">

        <!-- MTN -->
        <label class="payment-option">
            <input type="radio" name="payment_method" value="mtn" required>
            <div class="option-content">
                <img src="/images/mtn.png" class="logo">
                <span>MTN MoMo</span>
            </div>
        </label>

        <!-- Airtel -->
        <label class="payment-option">
            <input type="radio" name="payment_method" value="airtel">
            <div class="option-content">
                <img src="/images/airtel.png" class="logo">
                <span>Airtel Money</span>
            </div>
        </label>

        <!-- Bank -->
        <label class="payment-option">
            <input type="radio" name="payment_method" value="bank">
            <div class="option-content">
                <img src="/images/bk.png" class="logo">
                <span>Bank of Kigali</span>
            </div>
        </label>
<button type="submit" class="btn-continue mt-4">
    Continue
</button>

    </form>

    </div>

</body>
</html>
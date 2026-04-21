<!DOCTYPE html>
<html>
<head>
    <title>MTN Payment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
          background: linear-gradient(135deg, #ffcc00, #ffeb3b);
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .payment-container {
            width: 100%;
            max-width: 420px;
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.25);
            text-align: center;
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            width: 110px;
            margin-bottom: 15px;
        }

        h3 {
            font-weight: 700;
         color: #ffcc00;
        }

        .subtitle {
            color: #777;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;
        }

        .input-group {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        .input-group-text {
            background: #f8f8f8;
            border: none;
            font-weight: bold;
        }

        input {
            border: none !important;
            outline: none !important;
            padding: 12px;
        }

        input:focus {
            box-shadow: none !important;
        }

        .input-group:focus-within {
            border: 1px solid #c40000;
            box-shadow: 0 0 0 3px rgba(196,0,0,0.1);
        }

        .btn-pay {
            
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: bold;
            width: 100%;
            transition: 0.3s;
             background: linear-gradient(135deg, #ffcc00, #ffeb3b);
    color: black; /* better contrast on yellow */
        }

        .btn-pay:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(196,0,0,0.4);
        }

        .booking-info {
            background: #f9f9f9;
            border-radius: 12px;
            padding: 12px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .booking-info strong {
            color: #c40000;
        }

    </style>
</head>

<body>

<div class="payment-container">

    <!-- LOGO -->
    <img src="/images/mtn.png" class="logo" alt="MTN">

    <h3> MOMO Payment</h3>
    <div class="subtitle">Secure mobile payment</div>

    <!-- BOOKING INFO -->
    <div class="booking-info">
        Booking for <strong>{{ $booking->name }}</strong>
    </div>

    <!-- FORM -->
  <form method="POST" action="{{ route('payment.confirm', $booking->id) }}">
        @csrf

        <div class="form-group">
            <label>Phone Number</label>
            <div class="input-group">
                <span class="input-group-text">+250</span>
                <input 
                    type="text" 
                    name="phone" 
                    placeholder="7XXXXXXXX"
                    pattern="7[0-9]{8}"
                    title="Enter a valid Rwanda number (7XXXXXXXX)"
                    required
                >
            </div>
        </div>

        <button class="btn-pay">
            Pay Now
        </button>
    </form>

</div>

</body>
</html>
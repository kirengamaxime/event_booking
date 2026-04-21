<!DOCTYPE html>
<html>
<head>
    <title>Bank Payment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #004080, #007bff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-box {
            background: white;
            padding: 30px;
            border-radius: 20px;
            width: 400px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }

        .logo {
            width: 120px;
            margin-bottom: 20px;
        }

        .btn-pay {
            background: #004080;
            color: white;
            border-radius: 10px;
            padding: 12px;
            width: 100%;
            border: none;
        }

        .btn-pay:hover {
            background: #002f5b;
        }
    </style>
</head>

<body>

<div class="card-box">

    <!-- YOUR LOGO -->
    <img src="/images/bk.png" class="logo" alt="Bank of Kigali">

    <h4>Bank Payment</h4>

    <p><strong>Name:</strong> {{ $booking->name }}</p>
<form method="POST" action="{{ route('payment.confirm', $booking->id) }}">
    @csrf

    <input 
        type="text" 
        name="account_number"
        class="form-control mb-3" 
        placeholder="Enter Account Number"
        pattern="[0-9]{10,16}"
        title="Account number must be 10 to 16 digits"
        required
    >

    <input 
        type="text" 
        name="account_name"
        class="form-control mb-3" 
        placeholder="Account Name"
        required
    >

    <button type="submit" class="btn-pay">
        Pay via Bank
    </button>
</form>

</div>

</body>
</html>
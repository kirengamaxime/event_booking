<!DOCTYPE html>
<html>
<head>
    <title>Payment Receipt</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .receipt {
            width: 420px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(15px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .receipt-header {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            text-align: center;
            padding: 25px;
        }

        .receipt-header h4 {
            margin: 10px 0 0;
            font-weight: bold;
        }

        .success-icon {
            font-size: 50px;
        }

        .receipt-body {
            padding: 25px;
        }

        .row-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .row-item span {
            color: #555;
        }

        .divider {
            border-top: 1px dashed #ddd;
            margin: 20px 0;
        }

        .amount {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
        }

        .badge-ticket {
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 12px;
        }

        .vip {
            background: gold;
            color: black;
        }

        .normal {
            background: #6c757d;
            color: white;
        }

        .receipt-footer {
            text-align: center;
            padding: 20px;
        }

        .btn-home {
            background: #2a5298;
            color: white;
            border-radius: 10px;
            padding: 10px 20px;
        }

    </style>
</head>

<body>

<div class="receipt">

    <!-- HEADER -->
    <div class="receipt-header">
        <div class="success-icon">✔</div>
        <h4>Payment Successful</h4>
        <small>Your booking is confirmed</small>
    </div>

    <!-- BODY -->
    <div class="receipt-body">

        <div class="row-item">
            <strong>Name</strong>
            <span>{{ $booking->name }}</span>
        </div>

        <div class="row-item">
            <strong>Email</strong>
            <span>{{ $booking->email }}</span>
        </div>

        <div class="row-item">
            <strong>Ticket</strong>
            <span>
                <span class="badge-ticket {{ $booking->ticket_type == 'vip' ? 'vip' : 'normal' }}">
                    {{ strtoupper($booking->ticket_type) }}
                </span>
            </span>
        </div>

        <div class="row-item">
            <strong>Status</strong>
            <span class="text-success">Confirmed</span>
        </div>

        <div class="divider"></div>

        <!-- AMOUNT -->
        <div class="row-item">
            <strong>Total Paid</strong>
            <span class="amount">
                {{ $booking->ticket_type == 'vip' ? '15,000 RWF' : '5,000 RWF' }}
            </span>
        </div>

        <div class="divider"></div>

        <!-- FAKE TRANSACTION INFO -->
        <div class="row-item">
            <strong>Reference</strong>
            <span>EVT-{{ rand(100000,999999) }}</span>
        </div>

        <div class="row-item">
            <strong>Date</strong>
            <span>{{ now()->format('d M Y, H:i') }}</span>
        </div>

    </div>

    <!-- FOOTER -->
    <div class="receipt-footer">
        <a href="{{ route('events.index') }}" class="btn btn-home">
            Back to Events
        </a>
    </div>

</div>

</body>
</html>
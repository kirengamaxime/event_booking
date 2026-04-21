<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class PaymentController extends Controller
{
    // SHOW PAYMENT PAGE
    public function show($id)
    {
        $booking = Booking::with('event')->findOrFail($id);

        return view('payment.show', [
            'booking' => $booking,
            'event' => $booking->event
        ]);
    }


    public function confirmation(Booking $booking)
{
    return view('payment.confirmation', compact('booking'));
}

public function confirm(Request $request, Booking $booking)
{
    // You can store fake payment info if you want later

    return redirect()->route('payment.confirmation', $booking->id);
}
    // HANDLE PAYMENT METHOD SELECTION
   public function process(Request $request)
{
    $request->validate([
        'payment_method' => 'required',
        'booking_id' => 'required'
    ]);

    if ($request->payment_method === 'mtn') {
        return redirect()->route('payment.mtn', $request->booking_id);
    }

    if ($request->payment_method === 'airtel') {
        return redirect()->route('payment.airtel', $request->booking_id);
    }

    // ✅ ADD THIS BLOCK
    if ($request->payment_method === 'bank') {
        return redirect()->route('payment.bank', $request->booking_id);
    }

    return back()->with('error', 'Invalid payment method');
}
    // MTN PAGE
    public function mtn(Booking $booking)
    {
        return view('payment.mtn', compact('booking'));
    }

    // AIRTEL PAGE
    public function airtel(Booking $booking)
    {
        return view('payment.airtel', compact('booking'));
    }

    public function bank(Booking $booking)
{
    return view('payment.bank', compact('booking'));
}
}
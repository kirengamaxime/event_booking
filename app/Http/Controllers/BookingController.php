<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Event;

class BookingController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'ticket_type' => 'required',
        'event_id' => 'required'
    ]);

    $booking = Booking::create([
        'name' => $request->name,
        'email' => $request->email,
        'ticket_type' => $request->ticket_type,
        'event_id' => $request->event_id
    ]);

    return redirect()->route('payments.show', $booking->id);
}

}

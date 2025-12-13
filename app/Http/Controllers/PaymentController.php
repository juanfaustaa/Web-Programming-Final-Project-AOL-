<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Nampilin halaman payment
    public function show($bookingId)
    {
        $booking = Booking::with(['venue', 'court', 'user'])->findOrFail($bookingId);
        return view('payments.show', compact('booking'));
    }

    // membuat pembayaran dan masukin data pembayaran ke database
    public function pay(Request $request, $bookingId)
    {
        $request->validate([
            'method' => 'required|in:cash,transfer,virtual account'
        ]);

        $booking = Booking::findOrFail($bookingId);

        $payment = Payment::create([
            'booking_id' => $booking->id,
            'amount'     => $booking->total_price,
            'method'     => $request->method,
            'status'     => 'success',
            'paid_at'    => now()
        ]);

        $booking->update([
            'status' => 'paid'
        ]);

        return redirect()->route('home')->with('success', 'Pembayaran berhasil! Booking Anda telah dikonfirmasi.');
    }
}


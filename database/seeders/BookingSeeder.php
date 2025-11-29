<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        Booking::create([
            'user_id'        => 2, // user biasa
            'court_id'       => 1,
            'booking_date'   => now()->addDay()->toDateString(),
            'start_time'     => '19:00',
            'end_time'       => '21:00',
            'duration_hour'  => 2,
            'total_price'    => 150000,
            'status'         => 'pending',
        ]);
    }
}

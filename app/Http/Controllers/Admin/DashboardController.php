<?php

namespace App\Http\Controllers\Admin;

use App\Models\Venue;
use App\Models\Booking;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVenues = Venue::count();
        $totalBookings = Booking::count();
        $activeBookings = Booking::where('status', 'pending')->count();

        // 2. Ambil list Venue untuk ditampilkan (Grid View)
        $venues = Venue::with('courts')->latest()->get();

        return view('admin.dashboard', compact('totalVenues', 'totalBookings', 'activeBookings', 'venues'));
    }
}

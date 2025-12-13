<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Venue;
use App\Models\Court;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // ==========================================
        // 1. STATISTIK RINGKAS (Mini Cards)
        // ==========================================

        // Pendapatan Hari Ini (Asumsi ada kolom 'total_price' di tabel bookings)
        $revenueToday = Booking::whereDate('created_at', Carbon::today())
            ->where('status', '!=', 'cancelled') // Jangan hitung yang batal
            ->sum('total_price');

        // Total Booking (Semua waktu)
        $totalBookings = Booking::count();

        // Total Venue Aktif
        $activeVenues = Venue::count();

        // User Baru (Hitung user unik dari booking bulan ini sebagai contoh)
        // Atau jika ada model User, gunakan: User::whereMonth('created_at', Carbon::now()->month)->count();
        $newUsers = Booking::whereMonth('created_at', Carbon::now()->month)
            ->distinct('user_id')
            ->count('user_id');

        $stats = [
            'revenue_today' => $revenueToday,
            'total_booking' => $totalBookings,
            'active_venues' => $activeVenues,
            'new_users'     => $newUsers
        ];

        // ==========================================
        // 2. DATA GRAFIK (7 Hari Terakhir)
        // ==========================================

        $chartLabels = [];
        $bookingData = [];
        $revenueData = [];

        // Loop 7 hari ke belakang
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $chartLabels[] = $date->isoFormat('ddd'); // Sen, Sel, Rab...

            // Data per hari
            $dayQuery = Booking::whereDate('created_at', $date->format('Y-m-d'))
                ->where('status', '!=', 'cancelled');

            $bookingData[] = $dayQuery->count();
            // Simpan dalam juta (biar grafik rapi), misal 1.5 (juta)
            $revenueData[] = round($dayQuery->sum('total_price') / 1000000, 2);
        }

        // ==========================================
        // 3. POPULAR COURTS (Data Real dari DB)
        // ==========================================

        // Ambil Court beserta jumlah booking & total pendapatannya
        $queryCourts = Court::with('venue') // Load data Venue (untuk nama & tipe)
            ->withCount(['bookings' => function ($query) {
                $query->where('status', '!=', 'cancelled'); // Hitung yang tidak cancel
            }])
            ->withSum(['bookings' => function ($query) {
                $query->where('status', '!=', 'cancelled');
            }], 'total_price')
            ->orderByDesc('bookings_count') // Urutkan dari yang paling laku
            ->take(5) // Ambil 5 teratas
            ->get();

        // Cari booking terbanyak (untuk menghitung persentase bar)
        $maxBookings = $queryCourts->first() ? $queryCourts->first()->bookings_count : 1;

        // Format data agar sesuai tampilan View
        $popularCourts = $queryCourts->map(function ($court) use ($maxBookings) {
            return (object) [
                'name' => $court->court_name, // Nama Lapangan
                'type' => $court->venue->type ?? 'General', // Tipe Olahraga dari Venue
                'total_bookings' => $court->bookings_count,
                'revenue' => number_format($court->bookings_sum_total_price ?? 0, 0, ',', '.'),
                // Hitung persentase relatif terhadap juara 1 (untuk progress bar)
                'percentage' => $maxBookings > 0 ? ($court->bookings_count / $maxBookings) * 100 : 0
            ];
        });

        // ==========================================
        // 4. DONUT CHART (Persentase Tipe Olahraga)
        // ==========================================
        // Menghitung jumlah booking berdasarkan tipe venue
        $sportStats = Venue::withCount('courts')
            ->get()
            ->groupBy('type')
            ->map(function ($items) {
                return $items->count();
            });

        // Pastikan urutan label sesuai (Badminton, Futsal, Tennis) agar warna chart konsisten
        $sportPercentages = [
            $sportStats['Badminton'] ?? 0,
            $sportStats['Futsal'] ?? 0,
            $sportStats['Tennis'] ?? 0
        ];

        // ==========================================
        // 5. BOOKING TERBARU (List)
        // ==========================================
        $recentBookings = Booking::with(['user', 'court.venue']) // Eager load relasi
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($booking) {
                return (object) [
                    'customer' => $booking->user->name ?? 'Guest', // Asumsi ada relasi user
                    'court' => $booking->court->court_name ?? 'Unknown Court',
                    'venue_type' => $booking->court->venue->type ?? 'Sport',
                    'time' => Carbon::parse($booking->start_time)->format('H:i'),
                    'status' => $booking->status
                ];
            });

        return view('admin.dashboard', compact(
            'stats',
            'chartLabels',
            'bookingData',
            'revenueData',
            'popularCourts',
            'sportPercentages',
            'recentBookings'
        ));
    }
}

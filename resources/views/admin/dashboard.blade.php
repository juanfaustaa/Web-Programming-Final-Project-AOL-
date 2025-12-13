@extends('layouts.admin')

@section('title', 'Executive Dashboard')

@push('styles')
    <style>
        :root {
            --primary-orange: #FF6700;
            --secondary-orange: #ff8533;
            --text-dark: #1e293b;
            --card-border: #f1f5f9;
        }

        /* 1. HERO SECTION */
        .welcome-card {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border-radius: 24px;
            padding: 40px;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.3);
        }

        .welcome-card::after {
            content: '';
            position: absolute;
            right: -50px;
            bottom: -50px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 103, 0, 0.15) 0%, rgba(255, 255, 255, 0) 70%);
            border-radius: 50%;
            filter: blur(40px);
        }

        /* 2. ANALYTICS CARDS */
        .chart-card {
            background: white;
            border-radius: 24px;
            padding: 25px;
            border: 1px solid var(--card-border);
            box-shadow: 0 4px 20px -5px rgba(0, 0, 0, 0.03);
            height: 100%;
            transition: transform 0.3s ease;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-title h5 {
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
            font-size: 1.1rem;
        }

        .chart-title span {
            font-size: 0.8rem;
            color: #64748b;
        }

        /* 3. MINI STAT CARDS */
        .mini-stat-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            border: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s;
        }

        .mini-stat-card:hover {
            transform: translateY(-5px);
            border-color: #FF6700;
            box-shadow: 0 10px 30px rgba(255, 103, 0, 0.1);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        /* 4. RECENT BOOKINGS LIST */
        .booking-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px dashed #e2e8f0;
        }

        .booking-item:last-child {
            border-bottom: none;
        }

        .booking-time {
            min-width: 80px;
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Animations */
        .animate-up {
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid p-0">

        <div class="row mb-4 animate-up">
            <div class="col-12">
                <div class="welcome-card">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2 class="fw-bold mb-2">Dashboard Operasional</h2>
                            <p class="text-white-50 mb-0">
                                Ringkasan aktivitas hari ini, <span id="currentDate" class="text-white fw-bold"></span>.
                            </p>
                        </div>
                        <div class="col-lg-4 text-end d-none d-lg-block">
                            <button class="btn btn-light fw-bold rounded-pill px-4 py-2 shadow-sm text-dark">
                                <i class="bi bi-file-earmark-text me-2"></i> Download Laporan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4 animate-up delay-100">
            <div class="col-md-3">
                <div class="mini-stat-card">
                    <div class="icon-box" style="background: #fff7ed; color: #ea580c;">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0">
                            @if ($stats['revenue_today'] >= 1000000)
                                Rp {{ number_format($stats['revenue_today'] / 1000000, 1) }}Jt
                            @else
                                Rp {{ number_format($stats['revenue_today'] / 1000, 0) }}
                            @endif
                        </h4>
                        <small class="text-muted">Pendapatan Hari Ini</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat-card">
                    <div class="icon-box" style="background: #eff6ff; color: #2563eb;">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0">{{ $stats['total_booking'] }}</h4>
                        <small class="text-muted">Total Booking</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat-card">
                    <div class="icon-box" style="background: #f0fdf4; color: #16a34a;">
                        <i class="bi bi-shop"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0">{{ $stats['active_venues'] }}</h4>
                        <small class="text-muted">Venue Aktif</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat-card">
                    <div class="icon-box" style="background: #faf5ff; color: #9333ea;">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0">{{ $stats['new_users'] }}</h4>
                        <small class="text-muted">User Baru (Bulan Ini)</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4 animate-up delay-200">

            <div class="col-lg-8">
                <div class="chart-card">
                    <div class="chart-header">
                        <div class="chart-title">
                            <h5>Analisis Okupansi & Trafik</h5>
                            <span>Perbandingan jumlah booking vs pendapatan mingguan</span>
                        </div>
                        <select class="form-select form-select-sm w-auto border-0 bg-light fw-bold text-secondary">
                            <option>7 Hari Terakhir</option>
                        </select>
                    </div>
                    <div id="trafficChart" style="min-height: 350px;"></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="chart-card">
                    <div class="chart-header">
                        <div class="chart-title">
                            <h5>Kategori Populer</h5>
                            <span>Distribusi booking berdasarkan tipe</span>
                        </div>
                        <button class="btn btn-sm btn-light border-0"><i class="bi bi-three-dots"></i></button>
                    </div>

                    <div id="sportsChart" style="min-height: 250px; display: flex; justify-content: center;"></div>

                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="fw-bold text-muted">DETAIL PERSENTASE</small>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2 p-2 rounded hover-bg-light">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-1" style="background: #FF6700;"> </span>
                                <span class="small fw-semibold">Badminton</span>
                            </div>
                            <span class="small fw-bold">{{ $sportPercentages[0] ?? 0 }} Data</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2 p-2 rounded hover-bg-light">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-1" style="background: #1e293b;"> </span>
                                <span class="small fw-semibold">Futsal</span>
                            </div>
                            <span class="small fw-bold">{{ $sportPercentages[1] ?? 0 }} Data</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between p-2 rounded hover-bg-light">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-1" style="background: #f59e0b;"> </span>
                                <span class="small fw-semibold">Tennis/Padel</span>
                            </div>
                            <span class="small fw-bold">{{ $sportPercentages[2] ?? 0 }} Data</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 animate-up delay-300">

            <div class="col-lg-6">
                <div class="chart-card">
                    <div class="chart-header">
                        <div class="chart-title">
                            <h5>Booking Terbaru</h5>
                            <span>Transaksi yang baru masuk</span>
                        </div>
                        <a href="/admin/bookings" class="text-decoration-none small fw-bold text-orange-600"
                            style="color: #FF6700;">Lihat Semua</a>
                    </div>

                    <div class="booking-list">
                        @forelse($recentBookings as $booking)
                            <div class="booking-item">
                                <div class="booking-time">
                                    <span class="d-block text-dark">{{ $booking->time }}</span>
                                    <span class="badge bg-light text-secondary rounded-pill"
                                        style="font-size: 10px;">WIB</span>
                                </div>
                                <div class="booking-info flex-grow-1 px-3">
                                    <h6 class="text-dark">{{ $booking->court }}</h6>
                                    <p class="small text-muted">Customer: {{ $booking->customer }}</p>
                                </div>
                                <div class="booking-status">
                                    @if ($booking->status == 'pending')
                                        <span
                                            class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill">Pending</span>
                                    @elseif($booking->status == 'confirmed' || $booking->status == 'completed')
                                        <span
                                            class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">Paid</span>
                                    @elseif($booking->status == 'cancelled')
                                        <span
                                            class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">Cancel</span>
                                    @else
                                        <span
                                            class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">{{ $booking->status }}</span>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4 text-muted small">Belum ada booking terbaru.</div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="chart-card bg-dark text-white border-0" style="background: #111827;">
                    <div class="chart-header">
                        <div class="chart-title">
                            <h5 class="text-white">Lapangan Terlaris</h5>
                            <span class="text-white-50">Top 5 Court Berdasarkan Booking</span>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary border-0 text-white-50">
                            <i class="bi bi-filter"></i>
                        </button>
                    </div>

                    <div class="court-list d-flex flex-column gap-3">
                        @forelse($popularCourts as $index => $court)
                            <div class="court-item p-3 rounded-3"
                                style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.05);">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold"
                                            style="width: 32px; height: 32px; 
                                            background: {{ $index == 0 ? '#FF6700' : ($index == 1 ? '#334155' : 'rgba(255,255,255,0.1)') }}; 
                                            color: {{ $index == 0 ? 'white' : 'rgba(255,255,255,0.7)' }};">
                                            {{ $index + 1 }}
                                        </div>

                                        <div>
                                            <h6 class="mb-0 text-white" style="font-size: 0.95rem;">{{ $court->name }}
                                            </h6>
                                            <small class="text-white-50"
                                                style="font-size: 0.75rem;">{{ $court->type }}</small>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <span class="d-block fw-bold text-white">{{ $court->total_bookings }} <span
                                                class="small fw-normal text-white-50">Bookings</span></span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <div class="progress flex-grow-1"
                                        style="height: 6px; background: rgba(255,255,255,0.1); border-radius: 10px;">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ $court->percentage }}%; 
                                            background-color: {{ $index == 0 ? '#FF6700' : ($index == 1 ? '#38bdf8' : '#94a3b8') }}; 
                                            border-radius: 10px;">
                                        </div>
                                    </div>
                                    <small class="text-white-50"
                                        style="font-size: 0.7rem; width: 80px; text-align: right;">Rp
                                        {{ $court->revenue }}</small>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4 text-white-50 small">Belum ada data lapangan.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Set Tanggal Hari Ini
            const dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            document.getElementById('currentDate').textContent = new Date().toLocaleDateString('id-ID',
                dateOptions);

            // --- MENGAMBIL DATA DARI CONTROLLER ---
            // Blade mengubah array PHP menjadi JSON Javascript
            const labels = @json($chartLabels);
            const bookingData = @json($bookingData);
            const revenueData = @json($revenueData);
            const sportData = @json($sportPercentages);

            // 2. MIXED CHART (Traffic & Occupancy)
            var trafficOptions = {
                series: [{
                    name: 'Total Booking',
                    type: 'column',
                    data: bookingData // Data Real
                }, {
                    name: 'Pendapatan (Juta)',
                    type: 'line',
                    data: revenueData // Data Real
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    toolbar: {
                        show: false
                    },
                    fontFamily: 'Plus Jakarta Sans, sans-serif'
                },
                stroke: {
                    width: [0, 4],
                    curve: 'smooth'
                },
                plotOptions: {
                    bar: {
                        columnWidth: '40%',
                        borderRadius: 6
                    }
                },
                dataLabels: {
                    enabled: false
                },
                labels: labels, // Label Hari (Sen, Sel, dll)
                colors: ['#FF6700', '#1e293b'], // Orange (Booking), Navy (Revenue)
                xaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                yaxis: [{
                    title: {
                        text: 'Booking',
                        style: {
                            color: '#FF6700'
                        }
                    },
                }, {
                    opposite: true,
                    title: {
                        text: 'Pendapatan (Juta)',
                        style: {
                            color: '#1e293b'
                        }
                    }
                }],
                legend: {
                    position: 'top'
                },
                grid: {
                    borderColor: '#f1f5f9'
                },
                tooltip: {
                    y: {
                        formatter: function(val, {
                            seriesIndex
                        }) {
                            if (seriesIndex === 1) return "Rp " + val + " Juta";
                            return val + " Bookings";
                        }
                    }
                }
            };

            var trafficChart = new ApexCharts(document.querySelector("#trafficChart"), trafficOptions);
            trafficChart.render();

            // 3. DONUT CHART (Kategori Populer)
            var sportsOptions = {
                series: sportData, // Data Real [Badminton, Futsal, Tennis]
                chart: {
                    type: 'donut',
                    height: 250,
                    fontFamily: 'Plus Jakarta Sans, sans-serif'
                },
                // Label Legend
                labels: ['Badminton', 'Futsal', 'Tennis'],
                colors: ['#FF6700', '#1e293b', '#f59e0b'],
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                            labels: {
                                show: true,
                                name: {
                                    show: false
                                },
                                value: {
                                    show: true,
                                    fontSize: '24px',
                                    fontWeight: 700,
                                    color: '#1e293b',
                                    formatter: function(val) {
                                        return val
                                    }
                                },
                                total: {
                                    show: true,
                                    showAlways: true,
                                    label: 'Total',
                                    fontSize: '14px',
                                    color: '#64748b',
                                    formatter: function(w) {
                                        return w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                                    }
                                }
                            }
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                }, // Kita pakai custom legend di HTML
                stroke: {
                    show: false
                }
            };

            var sportsChart = new ApexCharts(document.querySelector("#sportsChart"), sportsOptions);
            sportsChart.render();
        });
    </script>
@endpush

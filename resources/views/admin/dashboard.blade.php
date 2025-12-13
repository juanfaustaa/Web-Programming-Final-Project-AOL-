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

        /* 1. HERO SECTION (Updated) */
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

        /* 2. ANALYTICS CARDS (Mixed Chart Section) */
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

        /* 3. MINI STAT CARDS (Clean Style) */
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

        /* 4. RECENT BOOKINGS LIST (Modern List) */
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

        .booking-info h6 {
            margin: 0;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .booking-info p {
            margin: 0;
            font-size: 0.8rem;
            color: #64748b;
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
                    <div class="icon-box bg-orange-100 text-orange-600" style="background: #fff7ed; color: #ea580c;">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0">Rp 12.5M</h4>
                        <small class="text-muted">Pendapatan Hari Ini</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat-card">
                    <div class="icon-box bg-blue-100 text-blue-600" style="background: #eff6ff; color: #2563eb;">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0">86</h4>
                        <small class="text-muted">Total Booking</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat-card">
                    <div class="icon-box bg-green-100 text-green-600" style="background: #f0fdf4; color: #16a34a;">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0">92%</h4>
                        <small class="text-muted">Tingkat Okupansi</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat-card">
                    <div class="icon-box bg-purple-100 text-purple-600" style="background: #faf5ff; color: #9333ea;">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0">12</h4>
                        <small class="text-muted">User Baru</small>
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
                            <option>Bulan Ini</option>
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
                            <span class="small fw-bold">45%</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2 p-2 rounded hover-bg-light">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-1" style="background: #1e293b;"> </span>
                                <span class="small fw-semibold">Futsal</span>
                            </div>
                            <span class="small fw-bold">30%</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between p-2 rounded hover-bg-light">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-1" style="background: #f59e0b;"> </span>
                                <span class="small fw-semibold">Tennis/Padel</span>
                            </div>
                            <span class="small fw-bold">25%</span>
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
                        @foreach ([1, 2, 3, 4] as $i)
                            <div class="booking-item">
                                <div class="booking-time">
                                    <span class="d-block text-dark">{{ 10 + $i }}:00</span>
                                    <span class="badge bg-light text-secondary rounded-pill"
                                        style="font-size: 10px;">AM</span>
                                </div>
                                <div class="booking-info flex-grow-1">
                                    <h6>{{ ['Court A - Badminton', 'Court C - Futsal', 'Court B - Tennis', 'Court A - Padel'][$i - 1] }}
                                    </h6>
                                    <p>Oleh: {{ ['Budi Santoso', 'Siti Aminah', 'Rahmat Hidayat', 'Dewi Lestari'][$i - 1] }}
                                    </p>
                                </div>
                                <div class="booking-status">
                                    @if ($i == 1)
                                        <span
                                            class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill">Pending</span>
                                    @elseif($i == 2)
                                        <span
                                            class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">Paid</span>
                                    @else
                                        <span
                                            class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">Booked</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="chart-card bg-dark text-white" style="background: #111827; border: none;">
                    <div class="chart-header">
                        <div class="chart-title">
                            <h5 class="text-white">Status Lapangan (Live)</h5>
                            <span class="text-white-50"><span class="badge bg-danger rounded-circle p-1 me-1"> </span>
                                Real-time monitoring</span>
                        </div>
                    </div>

                    <div class="row g-3">
                        @foreach (['A1', 'A2', 'B1', 'B2', 'C1', 'C2'] as $court)
                            <div class="col-4">
                                <div class="p-3 rounded-3 text-center transition-transform hover-scale"
                                    style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                                    <small class="d-block text-white-50 mb-2">Court {{ $court }}</small>
                                    @if ($loop->index % 3 == 0)
                                        <i class="bi bi-check-circle-fill text-success fs-3"></i>
                                        <div class="small text-success mt-1">Kosong</div>
                                    @elseif($loop->index % 3 == 1)
                                        <i class="bi bi-x-circle-fill text-danger fs-3"></i>
                                        <div class="small text-danger mt-1">Dipakai</div>
                                    @else
                                        <i class="bi bi-clock-fill text-warning fs-3"></i>
                                        <div class="small text-warning mt-1">Booked</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4 pt-3 border-top border-secondary border-opacity-25 text-center">
                        <a href="/admin/monitoring" class="btn btn-outline-light btn-sm rounded-pill px-4">Buka Monitor
                            Penuh</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Set Tanggal
            const dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            document.getElementById('currentDate').textContent = new Date().toLocaleDateString('id-ID',
            dateOptions);

            // 2. MIXED CHART (Traffic & Occupancy)
            var trafficOptions = {
                series: [{
                    name: 'Total Booking',
                    type: 'column',
                    data: [44, 55, 57, 56, 61, 58, 63]
                }, {
                    name: 'Pendapatan (Juta)',
                    type: 'line',
                    data: [76, 85, 101, 98, 87, 105, 91]
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
                        borderRadius: 8
                    }
                },
                dataLabels: {
                    enabled: false
                },
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                colors: ['#FF6700', '#1e293b'], // Orange untuk Bar, Navy untuk Line
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
                        text: 'Pendapatan',
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
                }
            };

            var trafficChart = new ApexCharts(document.querySelector("#trafficChart"), trafficOptions);
            trafficChart.render();

            // 3. DONUT CHART (Popular Sports)
            var sportsOptions = {
                series: [45, 30, 25], // Badminton, Futsal, Tennis
                chart: {
                    type: 'donut',
                    height: 250,
                    fontFamily: 'Plus Jakarta Sans, sans-serif'
                },
                labels: ['Badminton', 'Futsal', 'Tennis'],
                colors: ['#FF6700', '#1e293b', '#f59e0b'], // Sesuaikan dengan tema
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
                                        return val + "%"
                                    }
                                },
                                total: {
                                    show: true,
                                    showAlways: true,
                                    label: 'Total',
                                    fontSize: '14px',
                                    color: '#64748b',
                                    formatter: function(w) {
                                        return "Populer"; // Teks tengah donut
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
                }, // Kita pakai legend custom di HTML
                stroke: {
                    show: false
                }
            };

            var sportsChart = new ApexCharts(document.querySelector("#sportsChart"), sportsOptions);
            sportsChart.render();
        });
    </script>
@endpush

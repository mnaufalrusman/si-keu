@extends('layouts/app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-header">SISA UANG</div>
                            <div class="card-body">Rp. {{ number_format($money, 2, ',', '.') }}</div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Karyawan</h4>
                            </div>
                            <div class="card-body">
                                {{ $officer::count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pendapatan</h4>
                            <div class="card-header-action">
                                <a href="#dailyIncome" data-tab="income-tab" class="btn active">Harian(terakhir)</a>
                                <a href="#WeeklyIncome" data-tab="income-tab" class="btn">Mingguan</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="income">
                                <div class="active" data-tab-group="income-tab" id="dailyIncome">
                                    <h4>Rp. {{ number_format($dailyIncome[0]->jumlah, 2, ',', '.') }}</h4>
                                </div>
                                <div class="" data-tab-group="income-tab" id="WeeklyIncome">
                                    <h4>Rp. {{ number_format($weeklyIncome->sum('jumlah'), 2, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                        <hr class="mx-3">
                        <div class="card card-statistic-2">
                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Pendapatan</h4>
                                </div>
                                <div class="card-body">
                                    Rp. {{ number_format($sumIncome, 2, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pengeluaran</h4>
                            <div class="card-header-action">
                                <a href="#dailyExpense" data-tab="expense-tab" class="btn active">Harian(terakhir)</a>
                                <a href="#WeeklyExspense" data-tab="expense-tab" class="btn">Mingguan</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="expense">
                                <div class="active" data-tab-group="expense-tab" id="dailyExpense">
                                    <h4>Rp. {{ number_format($dailyExpense[0]->jumlah, 2, ',', '.') }}</h4>
                                </div>
                                <div class="" data-tab-group="expense-tab" id="WeeklyExspense">
                                    <h4>Rp. {{ number_format($weeklyExpense->sum('jumlah'), 2, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                        <hr class="mx-3">
                        <div class="card card-statistic-2">
                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Pengeluaran</h4>
                                </div>
                                <div class="card-body">
                                    Rp. {{ number_format($sumExpense, 2, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pendapatan vs Pengeluaran</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="rasyid" height="158"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-hero">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="far fa-question-circle"></i>
                            </div>
                            <h4>
                                {{ $merged }}
                            </h4>
                            <div class="card-description">Pesan</div>
                        </div>
                        <div class="card-body p-0">
                            <div class="tickets-list">
                                <a href="#" class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>My order hasn't arrived yet</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div>Laila Tazkiah</div>
                                        <div class="bullet"></div>
                                        <div class="text-primary">1 min ago</div>
                                    </div>
                                </a>
                                <a href="#" class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>Please cancel my order</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div>Rizal Fakhri</div>
                                        <div class="bullet"></div>
                                        <div>2 hours ago</div>
                                    </div>
                                </a>
                                <a href="#" class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>Do you see my mother?</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div>Syahdan Ubaidillah</div>
                                        <div class="bullet"></div>
                                        <div>6 hours ago</div>
                                    </div>
                                </a>
                                <a href="features-tickets.html" class="ticket-item ticket-more">
                                    View All <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
    <script>
        var ctx = document.getElementById("rasyid").getContext('2d');
        var rasyid = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    @foreach ($merged as $m)
                        '{{ $m->created_at->format('M d Y') }}',
                    @endforeach
                ],
                datasets: [{
                        label: 'Sales',
                        data: [
                            @foreach ($weeklyIncome as $wi)
                                '{{ $wi->jumlah }}',
                            @endforeach
                        ],
                        borderWidth: 2,
                        backgroundColor: 'rgba(63,82,227,.8)',
                        borderWidth: 0,
                        borderColor: 'transparent',
                        pointBorderWidth: 0,
                        pointRadius: 3.5,
                        pointBackgroundColor: 'transparent',
                        pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
                    },
                    {
                        label: 'Budget',
                        data: [
                            @foreach ($weeklyExpense as $we)
                                '{{ $we->jumlah }}',
                            @endforeach
                        ],
                        borderWidth: 2,
                        backgroundColor: 'rgba(254,86,83,.7)',
                        borderWidth: 0,
                        borderColor: 'transparent',
                        pointBorderWidth: 0,
                        pointRadius: 3.5,
                        pointBackgroundColor: 'transparent',
                        pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
                    }
                ]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            // display: false,
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1000000,
                            callback: function(value, index, values) {
                                return 'Rp. ' + value;
                            }
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                            tickMarkLength: 15,
                        }
                    }]
                },
            }
        });
    </script>
@endsection

<div>
    {{-- Page Banner --}}
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('frontend/img/banner/page-banner-3.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Statistik</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('public.home') }}"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Statistik</span>
                                        </li>
                                    </ul>
                                </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Dynamic Statistics Section --}}
    @if($statistics->count() > 0)
    <section class="statistics-grid pt-60 pb-60">
        <div class="container">
            {{-- Age Statistics (Full Width if exists) --}}
            @php $ageStatistic = $statistics->where('type', 'age')->first(); @endphp
            @if($ageStatistic)
            <div class="row mb-20">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center fw-bold mb-3">{{ $ageStatistic->name }}</h4>
                            <p class="text-center text-muted">{{ $ageStatistic->description }}</p>
                        </div>
                        <div class="card-body">
                            {{-- Data Table --}}
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>{{ $ageStatistic->type == 'age' ? 'Kelompok Usia' : 'Kategori' }}</th>
                                            <th>Jumlah Jiwa</th>
                                            <th>Persentase</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ageStatistic->categories as $index => $category)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $category->category }}</td>
                                            <td>{{ number_format($category->value) }}</td>
                                            <td>{{ $category->percentage }}%</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="table-warning fw-bold">
                                        <tr>
                                            <td colspan="2">TOTAL</td>
                                            <td>{{ number_format($ageStatistic->total_value) }}</td>
                                            <td>100.00%</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            {{-- Chart --}}
                            <div class="mt-4">
                                <canvas id="chart-{{ $ageStatistic->type }}" style="height: 400px; width: 100%;"></canvas>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                Total: {{ number_format($ageStatistic->total_value) }} |
                                Diperbarui: {{ $ageStatistic->updated_at->format('d M Y H:i:s') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- Other Statistics Grid --}}
            <div class="row">
                @foreach($statistics->where('type', '!=', 'age') as $statistic)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $statistic->name }}</h5>
                            <p class="text-muted mb-0">{{ $statistic->description }}</p>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-{{ $statistic->type }}" style="height: 300px; width: 100%;"></canvas>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                Total: {{ number_format($statistic->total_value) }} |
                                Diperbarui: {{ $statistic->updated_at->format('d M Y') }}
                            </small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('livewire:initialized', () => {
    // Chart.js default configuration
    Chart.defaults.font.family = "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif";
    Chart.defaults.font.size = 12;
    Chart.defaults.color = '#666';

    // Statistics data from backend
    const statisticsData = @json($statistics);

    // Render charts dynamically
    statisticsData.forEach(statistic => {
        const ctx = document.getElementById(`chart-${statistic.type}`);
        if (ctx) {
            // Prepare chart data
            const chartData = {
                labels: statistic.categories.map(cat => cat.category),
                datasets: [{
                    label: 'Jumlah',
                    data: statistic.categories.map(cat => cat.value),
                    backgroundColor: statistic.categories.map(cat => cat.color),
                    borderColor: statistic.categories.map(cat => cat.color),
                    borderWidth: 1
                }]
            };

            // Chart configuration based on type
            let chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: ['pie', 'doughnut'].includes(statistic.chart_type) ? 'bottom' : 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const value = context.raw || context.parsed.y;
                                const percentage = total > 0 ? ((value / total) * 100).toFixed(2) : 0;
                                return context.label + ': ' + value.toLocaleString() + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            };

            // Add scales for bar and line charts
            if (['bar', 'line'].includes(statistic.chart_type)) {
                chartOptions.scales = {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    },
                    x: {
                        ticks: {
                            maxRotation: 45,
                            minRotation: 45
                        }
                    }
                };
            }

            // Create chart
            new Chart(ctx, {
                type: statistic.chart_type,
                data: chartData,
                options: chartOptions
            });

            console.log(`Rendered ${statistic.chart_type} chart for ${statistic.name}`);
        }
    });
});
</script>
@endpush

<div>
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('frontend/img/banner/page-banner-3.jpg') }}" style="background-image: url(&quot;{{ asset('frontend/img/banner/page-banner-3.jpg') }}&quot;);">
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

    <!-- Statistics Overview -->
    <section class="featured light-bg pt-55 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-center mb-10">
                        <div class="section__title">
                            <h5 class="st-titile">Statistik Desa</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services-item mb-30" data-aos="fade-up" data-aos-delay="100">
                        <div class="services-icon mb-25">
                            <i class="fal fa-users"></i>
                        </div>
                        <h6>Total Penduduk Desa</h6>
                        <div class="s-count-number">
                            <span>{{ number_format($totalPopulation) }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services-item mb-30" data-aos="fade-up" data-aos-delay="200">
                        <div class="services-icon mb-25">
                            <i class="fal fa-male"></i>
                        </div>
                        <h6>Penduduk Laki-Laki</h6>
                        <div class="s-count-number">
                            <span>{{ number_format($malePopulation) }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services-item mb-30" data-aos="fade-up" data-aos-delay="300">
                        <div class="services-icon mb-25">
                            <i class="fal fa-female"></i>
                        </div>
                        <h6>Penduduk Perempuan</h6>
                        <div class="s-count-number">
                            <span>{{ number_format($femalePopulation) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Age Statistics -->
    @if($ageStatistic)
    <section class="topsell__area-2 pt-60 pb-60">
        <div class="container my-4">
            <div class="row mt-50">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-center mb-10">
                        <div class="section__title">
                            <h4 class="text-center fw-bold mb-4">{{ $ageStatistic->name }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container my-5">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kelompok Usia</th>
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
                                    <td>{{ $ageStatistic->total_value > 0 ? number_format(($category->value / $ageStatistic->total_value) * 100, 2) : 0 }}%</td>
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
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mt-50">
                        <canvas id="chart-age" style="height: 400px; width: 100%;"></canvas>
                    </div>
                    <p class="text-end mt-3">
                        <small>Diperbarui: {{ $ageStatistic->updated_at->format('d M Y H:i:s') }}</small>
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Other Statistics Grid -->
    <section class="statistics-grid pt-60 pb-60">
        <div class="container">
            <div class="row">
                @if($educationStatistic)
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $educationStatistic->name }}</h5>
                            <p class="text-muted mb-0">{{ $educationStatistic->description }}</p>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-education" style="height: 300px; width: 100%;"></canvas>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                Total: {{ number_format($educationStatistic->total_value) }} |
                                Diperbarui: {{ $educationStatistic->updated_at->format('d M Y') }}
                            </small>
                        </div>
                    </div>
                </div>
                @endif

                @if($jobStatistic)
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $jobStatistic->name }}</h5>
                            <p class="text-muted mb-0">{{ $jobStatistic->description }}</p>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-job" style="height: 300px; width: 100%;"></canvas>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                Total: {{ number_format($jobStatistic->total_value) }} |
                                Diperbarui: {{ $jobStatistic->updated_at->format('d M Y') }}
                            </small>
                        </div>
                    </div>
                </div>
                @endif

                @if($religionStatistic)
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $religionStatistic->name }}</h5>
                            <p class="text-muted mb-0">{{ $religionStatistic->description }}</p>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-religion" style="height: 300px; width: 100%;"></canvas>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                Total: {{ number_format($religionStatistic->total_value) }} |
                                Diperbarui: {{ $religionStatistic->updated_at->format('d M Y') }}
                            </small>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Add more statistics as needed -->
                @if($statistics->where('type', 'marital')->first())
                @php $maritalStatistic = $statistics->where('type', 'marital')->first(); @endphp
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $maritalStatistic->name }}</h5>
                            <p class="text-muted mb-0">{{ $maritalStatistic->description }}</p>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-marital" style="height: 300px; width: 100%;"></canvas>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                Total: {{ number_format($maritalStatistic->total_value) }} |
                                Diperbarui: {{ $maritalStatistic->updated_at->format('d M Y') }}
                            </small>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
</div>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('livewire:initialized', () => {
    // Chart.js default configuration
    Chart.defaults.font.family = "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif";
    Chart.defaults.font.size = 12;
    Chart.defaults.color = '#666';

    // Age Statistics Chart
    @if($ageStatistic)
    console.log('Rendering Age Statistics Chart');

    const ageCtx = document.getElementById('chart-age');
    if (ageCtx) {
        new Chart(ageCtx, {
            type: '{{ $ageStatistic->chart_type }}',
            data: {
                labels: {!! json_encode($ageStatistic->categories->pluck('category')) !!},
                datasets: [{
                    label: 'Jumlah Jiwa',
                    data: {!! json_encode($ageStatistic->categories->pluck('value')) !!},
                    backgroundColor: {!! json_encode($ageStatistic->categories->pluck('color')) !!},
                    borderColor: {!! json_encode($ageStatistic->categories->pluck('color')) !!},
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((context.parsed.y / total) * 100).toFixed(2);
                                return context.label + ': ' + context.parsed.y.toLocaleString() + ' (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
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
                }
            }
        });
    }
    @endif

    // Education Statistics Chart
    @if($educationStatistic)
    console.log('Rendering Education Statistics Chart');

    const educationCtx = document.getElementById('chart-education');
    if (educationCtx) {
        new Chart(educationCtx, {
            type: '{{ $educationStatistic->chart_type }}',
            data: {
                labels: {!! json_encode($educationStatistic->categories->pluck('category')) !!},
                datasets: [{
                    label: 'Jumlah',
                    data: {!! json_encode($educationStatistic->categories->pluck('value')) !!},
                    backgroundColor: {!! json_encode($educationStatistic->categories->pluck('color')) !!},
                    borderColor: {!! json_encode($educationStatistic->categories->pluck('color')) !!},
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((context.parsed.y / total) * 100).toFixed(2);
                                return context.label + ': ' + context.parsed.y.toLocaleString() + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
        });
    }
    @endif

    // Job Statistics Chart
    @if($jobStatistic)
    console.log('Rendering Job Statistics Chart');

    const jobCtx = document.getElementById('chart-job');
    if (jobCtx) {
        new Chart(jobCtx, {
            type: '{{ $jobStatistic->chart_type }}',
            data: {
                labels: {!! json_encode($jobStatistic->categories->pluck('category')) !!},
                datasets: [{
                    label: 'Jumlah',
                    data: {!! json_encode($jobStatistic->categories->pluck('value')) !!},
                    backgroundColor: {!! json_encode($jobStatistic->categories->pluck('color')) !!},
                    borderColor: {!! json_encode($jobStatistic->categories->pluck('color')) !!},
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const value = context.raw;
                                const percentage = ((value / total) * 100).toFixed(2);
                                return context.label + ': ' + value.toLocaleString() + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
        });
    }
    @endif

    // Religion Statistics Chart
    @if($religionStatistic)
    console.log('Rendering Religion Statistics Chart');

    const religionCtx = document.getElementById('chart-religion');
    if (religionCtx) {
        new Chart(religionCtx, {
            type: '{{ $religionStatistic->chart_type }}',
            data: {
                labels: {!! json_encode($religionStatistic->categories->pluck('category')) !!},
                datasets: [{
                    label: 'Jumlah',
                    data: {!! json_encode($religionStatistic->categories->pluck('value')) !!},
                    backgroundColor: {!! json_encode($religionStatistic->categories->pluck('color')) !!},
                    borderColor: {!! json_encode($religionStatistic->categories->pluck('color')) !!},
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const value = context.raw;
                                const percentage = ((value / total) * 100).toFixed(2);
                                return context.label + ': ' + value.toLocaleString() + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
        });
    }
    @endif

    // Marital Statistics Chart
    @if($statistics->where('type', 'marital')->first())
    console.log('Rendering Marital Statistics Chart');

    @php $maritalStatistic = $statistics->where('type', 'marital')->first(); @endphp
    const maritalCtx = document.getElementById('chart-marital');
    if (maritalCtx) {
        new Chart(maritalCtx, {
            type: '{{ $maritalStatistic->chart_type }}',
            data: {
                labels: {!! json_encode($maritalStatistic->categories->pluck('category')) !!},
                datasets: [{
                    label: 'Jumlah',
                    data: {!! json_encode($maritalStatistic->categories->pluck('value')) !!},
                    backgroundColor: {!! json_encode($maritalStatistic->categories->pluck('color')) !!},
                    borderColor: {!! json_encode($maritalStatistic->categories->pluck('color')) !!},
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((context.parsed.y / total) * 100).toFixed(2);
                                return context.label + ': ' + context.parsed.y.toLocaleString() + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
        });
    }
    @endif
});
</script>
@endpush

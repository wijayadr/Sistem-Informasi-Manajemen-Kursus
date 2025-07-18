<div>
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('frontend/img/banner/page-banner-3.jpg') }}" style="background-image: url(&quot;{{ asset('frontend/img/banner/page-banner-3.jpg') }}&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">IDM</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('public.home') }}"><span>Home</span></a>
                                        </li>
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('public.idm.index') }}"><span>IDM</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>IDM Tahun {{ $idm_score->year }}</span>
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
    <div class="container-fluid py-4">
        <!-- Header Section -->
        <div class="row mb-30">
            <div class="col-xl-12">
                <div class="abs-section-title text-center">
                    <span>Tahun {{ $idm_score->year }}</span>
                    <h4>Indeks Desa Membangun (IDM)</h4>
                    <p>
                        Indeks Desa Membangun (IDM) merupakan indeks komposit yang dibentuk dari tiga indeks, yaitu Indeks Ketahanan Sosial, Indeks Ketahanan Ekonomi, dan Indeks Ketahanan Ekologi/Lingkungan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Score Card -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-lg border-0 bg-gradient-primary text-white">
                    <div class="card-body text-center py-5">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <h3 class="text-white mb-3">Skor IDM</h3>
                                <div class="display-1 fw-bold mb-0">
                                    {{ number_format($idm_score->idm_score, 3) }}
                                </div>
                                <small class="text-white-50">dari skala 0 - 1</small>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="text-white mb-3">Status IDM</h3>
                                <span class="badge bg-light text-dark fs-4 px-4 py-2">
                                    {{ $statusInfo['current_status'] }}
                                </span>
                                <div class="mt-3">
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-warning"
                                             role="progressbar"
                                             style="width: {{ ($idm_score->idm_score * 100) }}%"
                                             aria-valuenow="{{ ($idm_score->idm_score * 100) }}"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                        </div>
                                    </div>
                                    <small class="text-white-50 mt-2 d-block">
                                        Progress: {{ number_format($idm_score->idm_score * 100, 1) }}%
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Information Cards -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-{{ $statusInfo['color'] }} p-3 me-3">
                                <i class="fas fa-flag text-white"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Status Saat Ini</h5>
                                <p class="text-muted mb-0">Kategori pencapaian IDM</p>
                            </div>
                        </div>
                        <div class="text-center">
                            <span class="badge bg-{{ $statusInfo['color'] }} fs-5 px-4 py-2">
                                {{ $statusInfo['current_status'] }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-success p-3 me-3">
                                <i class="fas fa-medal text-white"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Target Status</h5>
                                <p class="text-muted mb-0">Level yang ingin dicapai</p>
                            </div>
                        </div>
                        <div class="text-center">
                            <span class="badge bg-success fs-5 px-4 py-2">
                                {{ $statusInfo['target_status'] }}
                            </span>
                            @if($statusInfo['next_target_score'])
                                <div class="mt-2">
                                    <small class="text-muted">
                                        Skor minimal: {{ number_format($statusInfo['next_target_score'], 3) }}
                                    </small>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Score Breakdown -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-chart-bar me-2"></i>
                            Rincian Skor Indeks
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- IKS -->
                            <div class="col-lg-4 mb-4">
                                <div class="text-center">
                                    <div class="position-relative d-inline-block">
                                        <svg width="120" height="120" viewBox="0 0 120 120">
                                            <circle cx="60" cy="60" r="50" fill="none" stroke="#e9ecef" stroke-width="8"/>
                                            <circle cx="60" cy="60" r="50" fill="none" stroke="#28a745" stroke-width="8"
                                                    stroke-dasharray="{{ (2 * 3.14159 * 50) }}"
                                                    stroke-dashoffset="{{ (2 * 3.14159 * 50) * (1 - $idm_score->iks) }}"
                                                    transform="rotate(-90 60 60)"/>
                                        </svg>
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <div class="h4 mb-0">{{ number_format($idm_score->iks, 3) }}</div>
                                            <small class="text-muted">IKS</small>
                                        </div>
                                    </div>
                                    <h6 class="mt-3 mb-2">Indeks Ketahanan Sosial</h6>
                                    <p class="text-muted small mb-0">Mengukur ketahanan sosial desa</p>
                                </div>
                            </div>

                            <!-- IKE -->
                            <div class="col-lg-4 mb-4">
                                <div class="text-center">
                                    <div class="position-relative d-inline-block">
                                        <svg width="120" height="120" viewBox="0 0 120 120">
                                            <circle cx="60" cy="60" r="50" fill="none" stroke="#e9ecef" stroke-width="8"/>
                                            <circle cx="60" cy="60" r="50" fill="none" stroke="#17a2b8" stroke-width="8"
                                                    stroke-dasharray="{{ (2 * 3.14159 * 50) }}"
                                                    stroke-dashoffset="{{ (2 * 3.14159 * 50) * (1 - $idm_score->ike) }}"
                                                    transform="rotate(-90 60 60)"/>
                                        </svg>
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <div class="h4 mb-0">{{ number_format($idm_score->ike, 3) }}</div>
                                            <small class="text-muted">IKE</small>
                                        </div>
                                    </div>
                                    <h6 class="mt-3 mb-2">Indeks Ketahanan Ekonomi</h6>
                                    <p class="text-muted small mb-0">Mengukur ketahanan ekonomi desa</p>
                                </div>
                            </div>

                            <!-- IKL -->
                            <div class="col-lg-4 mb-4">
                                <div class="text-center">
                                    <div class="position-relative d-inline-block">
                                        <svg width="120" height="120" viewBox="0 0 120 120">
                                            <circle cx="60" cy="60" r="50" fill="none" stroke="#e9ecef" stroke-width="8"/>
                                            <circle cx="60" cy="60" r="50" fill="none" stroke="#ffc107" stroke-width="8"
                                                    stroke-dasharray="{{ (2 * 3.14159 * 50) }}"
                                                    stroke-dashoffset="{{ (2 * 3.14159 * 50) * (1 - $idm_score->ikl) }}"
                                                    transform="rotate(-90 60 60)"/>
                                        </svg>
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <div class="h4 mb-0">{{ number_format($idm_score->ikl, 3) }}</div>
                                            <small class="text-muted">IKL</small>
                                        </div>
                                    </div>
                                    <h6 class="mt-3 mb-2">Indeks Ketahanan Ekologi</h6>
                                    <p class="text-muted small mb-0">Mengukur ketahanan lingkungan desa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Guidelines -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            Kategori Status IDM
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Rentang Skor</th>
                                                <th>Skor Minimal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="{{ $statusInfo['current_status'] == 'Mandiri' ? 'table-success' : '' }}">
                                                <td><span class="badge bg-success">Mandiri</span></td>
                                                <td>> 0.815</td>
                                                <td>0.815</td>
                                            </tr>
                                            <tr class="{{ $statusInfo['current_status'] == 'Maju' ? 'table-info' : '' }}">
                                                <td><span class="badge bg-info">Maju</span></td>
                                                <td>0.707 - 0.815</td>
                                                <td>0.707</td>
                                            </tr>
                                            <tr class="{{ $statusInfo['current_status'] == 'Berkembang' ? 'table-warning' : '' }}">
                                                <td><span class="badge bg-warning">Berkembang</span></td>
                                                <td>0.599 - 0.707</td>
                                                <td>0.599</td>
                                            </tr>
                                            <tr class="{{ $statusInfo['current_status'] == 'Tertinggal' ? 'table-danger' : '' }}">
                                                <td><span class="badge bg-danger">Tertinggal</span></td>
                                                <td>0.491 - 0.599</td>
                                                <td>0.491</td>
                                            </tr>
                                            <tr class="{{ $statusInfo['current_status'] == 'Sangat Tertinggal' ? 'table-dark' : '' }}">
                                                <td><span class="badge bg-dark">Sangat Tertinggal</span></td>
                                                <td>≤ 0.491</td>
                                                <td>0.000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-info">
                                    <h6><i class="fas fa-lightbulb me-2"></i>Informasi Status Saat Ini</h6>
                                    <hr>
                                    <p class="mb-2"><strong>Status:</strong> {{ $statusInfo['current_status'] }}</p>
                                    <p class="mb-2"><strong>Skor Minimal untuk Status Ini:</strong> {{ number_format($statusInfo['min_score'], 3) }}</p>
                                    @if($statusInfo['next_target_score'])
                                        <p class="mb-2"><strong>Target Status Berikutnya:</strong> {{ $statusInfo['target_status'] }}</p>
                                        <p class="mb-0"><strong>Skor yang Dibutuhkan:</strong> {{ number_format($statusInfo['next_target_score'], 3) }}</p>
                                        <p class="mb-0">
                                            <small class="text-muted">
                                                Kekurangan: {{ number_format($statusInfo['next_target_score'] - $idm_score->idm_score, 3) }} poin
                                            </small>
                                        </p>
                                    @else
                                        <p class="mb-0 text-success"><strong>✅ Sudah mencapai status tertinggi!</strong></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .max-width-700 {
            max-width: 700px;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .progress {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .progress-bar {
            background-color: #ffc107 !important;
        }

        .card {
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .table-responsive {
            border-radius: 8px;
        }

        .badge {
            font-size: 0.875em;
        }

        .alert {
            border-radius: 10px;
        }

        .btn-lg {
            padding: 12px 30px;
            font-size: 1.1rem;
        }

        .rounded-circle {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .display-1 {
            font-size: 4rem;
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .display-1 {
                font-size: 3rem;
            }

            .display-4 {
                font-size: 2rem;
            }
        }
    </style>
</div>

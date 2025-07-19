<div>
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('frontend/img/banner/page-banner-3.jpg') }}" style="background-image: url(&quot;{{ asset('frontend/img/banner/page-banner-3.jpg') }}&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Surat Desa</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('public.home') }}"><span>Home</span></a>
                                        </li>
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('public.letters.index') }}"><span>Surat Desa</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>{{ $letterType->letter_name }}</span>
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

    <!-- Main Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Letter Information -->
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-file-text me-2"></i>
                                Informasi Surat
                            </h5>
                        </div>
                        <div class="card-body">
                            <h4 class="mb-3">{{ $letterType->letter_name }}</h4>
                            <p class="text-muted mb-4">{{ $letterType->description }}</p>

                            <h6 class="fw-bold mb-3">
                                <i class="fas fa-upload me-2"></i>
                                Dokumen yang Diperlukan:
                            </h6>
                            <ul class="list-unstyled">
                                @foreach($requiredDocuments as $doc)
                                <li class="mb-2">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                        <div>
                                            <strong>{{ $doc->document_name }}</strong>
                                            <small class="d-block text-muted">{{ $doc->description }}</small>
                                            <small class="d-block text-info">
                                                Format: {{ strtoupper(str_replace(',', ', ', $doc->allowed_formats)) }}
                                                <br>Maksimal: {{ $doc->max_size_mb }}MB
                                            </small>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                            <div class="alert alert-info mt-4">
                                <i class="fas fa-info-circle me-2"></i>
                                <small>
                                    Pastikan semua dokumen sudah lengkap dan jelas terbaca sebelum mengajukan permohonan.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Application Form -->
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-edit me-2"></i>
                                Form Pengajuan Surat
                            </h5>
                        </div>
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form wire:submit.prevent="submitRequest">
                                <!-- Personal Information -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h6 class="fw-bold text-primary border-bottom pb-2 mb-3">
                                            <i class="fas fa-user me-2"></i>
                                            Data Pemohon
                                        </h6>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="applicant_name" class="form-label">
                                            Nama Lengkap <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control @error('applicant_name') is-invalid @enderror"
                                               id="applicant_name"
                                               wire:model="applicant_name"
                                               placeholder="Masukkan nama lengkap">
                                        @error('applicant_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone_number" class="form-label">Nomor Telepon</label>
                                        <input type="tel"
                                               class="form-control @error('phone_number') is-invalid @enderror"
                                               id="phone_number"
                                               wire:model="phone_number"
                                               placeholder="Contoh: 081234567890">
                                        @error('phone_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               id="email"
                                               wire:model="email"
                                               placeholder="contoh@email.com">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="purpose" class="form-label">Tujuan Penggunaan</label>
                                        <textarea class="form-control @error('purpose') is-invalid @enderror"
                                                  id="purpose"
                                                  wire:model="purpose"
                                                  rows="3"
                                                  placeholder="Jelaskan tujuan penggunaan surat ini..."></textarea>
                                        @error('purpose')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Document Upload Section -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h6 class="fw-bold text-primary border-bottom pb-2 mb-3">
                                            <i class="fas fa-upload me-2"></i>
                                            Upload Dokumen Persyaratan
                                        </h6>
                                    </div>
                                    @foreach($requiredDocuments as $index => $doc)
                                    <div class="col-12 mb-4">
                                        <div class="border rounded p-3 bg-light">
                                            <label class="form-label fw-bold">
                                                {{ $doc->document_name }} <span class="text-danger">*</span>
                                                <small class="text-muted fw-normal d-block">{{ $doc->description }}</small>
                                            </label>

                                            <div class="row align-items-center">
                                                <div class="col-md-8">
                                                    <input type="file"
                                                           class="form-control @error('uploadedFiles.'.$doc->id) is-invalid @enderror"
                                                           wire:model="uploadedFiles.{{ $doc->id }}"
                                                           accept="{{ implode(',', array_map(function($format) { return '.' . $format; }, explode(',', $doc->allowed_formats))) }}">
                                                    @error('uploadedFiles.'.$doc->id)
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    @if(isset($uploadedFiles[$doc->id]) && $uploadedFiles[$doc->id])
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <span class="badge bg-success">
                                                                <i class="fas fa-check me-1"></i>
                                                                File dipilih
                                                            </span>
                                                            <button type="button"
                                                                    class="btn btn-sm btn-outline-danger"
                                                                    wire:click="removeFile({{ $doc->id }})">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <small class="text-muted">
                                                <i class="fas fa-info-circle me-1"></i>
                                                Format yang diperbolehkan: {{ strtoupper(str_replace(',', ', ', $doc->allowed_formats)) }} |
                                                Maksimal {{ $doc->max_size_mb }}MB
                                            </small>

                                            <!-- Loading indicator for file upload -->
                                            <div wire:loading wire:target="uploadedFiles.{{ $doc->id }}" class="mt-2">
                                                <div class="spinner-border spinner-border-sm text-primary me-2" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                                <small class="text-primary">Mengupload file...</small>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <!-- Submit Button -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-grid gap-2">
                                            <button type="submit"
                                                    class="btn btn-primary btn-lg"
                                                    wire:loading.attr="disabled"
                                                    wire:target="submitRequest">
                                                <span wire:loading.remove wire:target="submitRequest">
                                                    <i class="fas fa-paper-plane me-2"></i>
                                                    Ajukan Permohonan
                                                </span>
                                                <span wire:loading wire:target="submitRequest">
                                                    <span class="spinner-border spinner-border-sm me-2" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </span>
                                                    Memproses...
                                                </span>
                                            </button>
                                            <small class="text-muted text-center">
                                                <i class="fas fa-shield-alt me-1"></i>
                                                Data Anda akan diproses dengan aman dan sesuai prosedur yang berlaku
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Information Section -->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 bg-transparent">
                        <div class="card-body text-center">
                            <h5 class="fw-bold mb-3">
                                <i class="fas fa-info-circle text-primary me-2"></i>
                                Informasi Penting
                            </h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="border rounded p-3 h-100 bg-white">
                                        <i class="fas fa-clock text-warning mb-2 fa-2x"></i>
                                        <h6 class="fw-bold">Waktu Proses</h6>
                                        <small class="text-muted">Permohonan akan diproses dalam 1-3 hari kerja</small>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="border rounded p-3 h-100 bg-white">
                                        <i class="fas fa-search text-info mb-2 fa-2x"></i>
                                        <h6 class="fw-bold">Tracking Status</h6>
                                        <small class="text-muted">Gunakan nomor tracking untuk memantau status permohonan</small>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="border rounded p-3 h-100 bg-white">
                                        <i class="fas fa-download text-success mb-2 fa-2x"></i>
                                        <h6 class="fw-bold">Download Surat</h6>
                                        <small class="text-muted">Surat dapat diunduh setelah status "Selesai"</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('styles')
<style>
    .card {
        border: 1px solid #e3e6f0;
        border-radius: 0.75rem;
    }

    .card-header {
        border-radius: 0.75rem 0.75rem 0 0 !important;
        border-bottom: 1px solid rgba(0,0,0,.125);
    }

    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .alert {
        border-radius: 0.5rem;
        border: none;
    }

    .badge {
        border-radius: 0.5rem;
        padding: 0.5em 0.75em;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    .shadow-sm {
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075) !important;
    }

    .border-bottom {
        border-bottom: 2px solid #dee2e6 !important;
    }

    .spinner-border-sm {
        width: 1rem;
        height: 1rem;
    }

    @media (max-width: 768px) {
        .card-body {
            padding: 1rem;
        }

        .col-md-6 {
            margin-bottom: 1rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto dismiss alerts after 5 seconds
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert-dismissible');
            alerts.forEach(function(alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    });
</script>
@endpush

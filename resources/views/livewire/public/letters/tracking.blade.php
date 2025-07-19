<div>
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('frontend/img/banner/page-banner-3.jpg') }}" style="background-image: url(&quot;{{ asset('frontend/img/banner/page-banner-3.jpg') }}&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Lacak Status Permohonan</h4>
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
                                            <span>Lacak Status Permohonan</span>
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

    <!-- Search Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-4">
                            <form wire:submit.prevent="searchRequest">
                                <div class="mb-3">
                                    <label for="tracking_number" class="form-label fw-bold">
                                        <i class="fas fa-search me-2"></i>
                                        Nomor Tracking
                                    </label>
                                    <input type="text"
                                           class="form-control form-control-lg @error('tracking_number') is-invalid @enderror"
                                           id="tracking_number"
                                           wire:model="tracking_number"
                                           placeholder="Contoh: REQ-20240101-0001"
                                           style="border-radius: 0.5rem;">
                                    @error('tracking_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Masukkan nomor tracking yang diberikan saat pengajuan surat.
                                        Pastikan formatnya benar, misalnya: <code>REQ-20240101-0001</code>.
                                    </small>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit"
                                            class="btn btn-primary btn-lg"
                                            wire:loading.attr="disabled"
                                            wire:target="searchRequest">
                                        <span wire:loading.remove wire:target="searchRequest">
                                            <i class="fas fa-search me-2"></i>
                                            Cari Permohonan
                                        </span>
                                        <span wire:loading wire:target="searchRequest">
                                            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                            Mencari...
                                        </span>
                                    </button>

                                    @if($letterRequest || $notFound)
                                    <button type="button"
                                            class="btn btn-outline-secondary"
                                            wire:click="resetSearch">
                                        <i class="fas fa-redo me-2"></i>
                                        Cari Lagi
                                    </button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Results Section -->
    @if($notFound)
    <section class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="alert alert-warning border-0 shadow-sm" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-triangle fa-2x me-3"></i>
                            <div>
                                <h5 class="alert-heading mb-1">Permohonan Tidak Ditemukan</h5>
                                <p class="mb-0">
                                    Nomor tracking <strong>{{ $tracking_number }}</strong> tidak ditemukan.
                                    Pastikan nomor tracking yang Anda masukkan sudah benar.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($letterRequest)
    <!-- Request Details Section -->
    <section class="py-4">
        <div class="container">
            <div class="row">
                <!-- Request Information -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-info-circle me-2"></i>
                                Detail Permohonan
                            </h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="text-muted small">Nomor Tracking:</td>
                                    <td class="fw-bold">{{ $letterRequest->tracking_number }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted small">Jenis Surat:</td>
                                    <td class="fw-bold">{{ $letterRequest->letterType->letter_name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted small">Nama Pemohon:</td>
                                    <td>{{ $letterRequest->applicant_name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted small">Tanggal Pengajuan:</td>
                                    <td>{{ $letterRequest->submitted_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted small">Status Saat Ini:</td>
                                    <td>
                                        <span class="badge bg-{{ $this->getStatusColor($letterRequest->request_status) }} px-3 py-2">
                                            {{ $this->getStatusText($letterRequest->request_status) }}
                                        </span>
                                    </td>
                                </tr>
                                @if($letterRequest->completed_at)
                                <tr>
                                    <td class="text-muted small">Tanggal Selesai:</td>
                                    <td>{{ $letterRequest->completed_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                @endif
                            </table>

                            @if($letterRequest->purpose)
                            <div class="mt-3">
                                <h6 class="fw-bold small text-muted mb-2">Tujuan Penggunaan:</h6>
                                <p class="small">{{ $letterRequest->purpose }}</p>
                            </div>
                            @endif

                            @if($letterRequest->admin_notes)
                            <div class="mt-3">
                                <h6 class="fw-bold small text-muted mb-2">Catatan Admin:</h6>
                                <div class="alert alert-info small mb-0">
                                    {{ $letterRequest->admin_notes }}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Status Timeline -->
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-history me-2"></i>
                                Riwayat Status
                            </h5>
                        </div>
                        <div class="card-body">
                            @if($statusHistory && $statusHistory->count() > 0)
                            <div class="timeline">
                                @foreach($statusHistory as $index => $history)
                                <div class="timeline-item {{ $index === 0 ? 'active' : '' }}">
                                    <div class="timeline-marker bg-{{ $this->getStatusColor($history->new_status) }}">
                                        <i class="fal fa-circle"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h6 class="mb-0 fw-bold">{{ $this->getStatusText($history->new_status) }}</h6>
                                            <small class="text-muted">{{ $history->changed_at->format('d/m/Y H:i') }}</small>
                                        </div>
                                        @if($history->remarks)
                                        <p class="text-muted mb-0 small">{{ $history->remarks }}</p>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="text-center py-4">
                                <i class="fas fa-clock fa-3x text-muted mb-3"></i>
                                <h6 class="text-muted">Belum ada riwayat status</h6>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Uploaded Documents -->
                    @if($letterRequest->uploadedDocuments->count() > 0)
                    <div class="card shadow-sm mt-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-paperclip me-2"></i>
                                Dokumen yang Diupload
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($letterRequest->uploadedDocuments as $doc)
                                <div class="col-md-6 mb-3">
                                    <div class="border rounded p-3 bg-light">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-file-alt text-primary fa-2x me-3"></i>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1 fw-bold">{{ $doc->documentType->document_name }}</h6>
                                                <small class="text-muted">{{ $doc->original_filename }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Download Section for Completed Requests -->
                    @if($letterRequest->request_status === 'completed')
                    <div class="card shadow-sm mt-4 border-success">
                        <div class="card-body text-center">
                            <i class="fas fa-check-circle text-success fa-3x mb-3"></i>
                            <h5 class="text-success mb-3">Permohonan Selesai!</h5>
                            <p class="text-muted mb-4">Surat Anda sudah siap untuk diunduh.</p>
                            <a href="{{ route('public.letters.download', $letterRequest->tracking_number) }}"
                               class="btn btn-success btn-lg"
                               wire:loading.attr="disabled"
                               wire:target="downloadLetter">
                                <i class="fas fa-download me-2"></i>
                                Unduh Surat
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif
</div>

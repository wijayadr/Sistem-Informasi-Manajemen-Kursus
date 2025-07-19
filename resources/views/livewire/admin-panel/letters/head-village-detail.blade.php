<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Detail Penandatanganan Surat - {{ $letter->tracking_number }}</h4>
                <div class="flex-shrink-0">
                    <a href="{{ route('admin.letters.head-village.index') }}" class="btn btn-primary">
                        Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-3">Informasi Pemohon</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td width="150">Nama</td>
                                <td>: {{ $letter->applicant_name }}</td>
                            </tr>
                            <tr>
                                <td>No. HP</td>
                                <td>: {{ $letter->phone_number ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: {{ $letter->email ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Keperluan</td>
                                <td>: {{ $letter->purpose ?? '-' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3">Informasi Surat</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td width="150">Jenis Surat</td>
                                <td>: {{ $letter->letterType->letter_name }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:
                                    @if($letter->request_status == 'processing')
                                        <span class="badge bg-info">Siap Ditandatangani</span>
                                    @elseif($letter->request_status == 'completed')
                                        <span class="badge bg-success">Sudah Ditandatangani</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Pengajuan</td>
                                <td>: {{ $letter->submitted_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            @if($letter->completed_at)
                                <tr>
                                    <td>Tanggal Selesai</td>
                                    <td>: {{ $letter->completed_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>

                {{-- File Surat --}}
                @if($letter->file)
                    <div class="mt-4">
                        <h6 class="mb-3">File Surat</h6>
                        <div class="card border border-primary">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-file-text-line fs-24 text-primary me-3"></i>
                                        <div>
                                            <h6 class="mb-1">
                                                @if($letter->request_status == 'completed')
                                                    Surat Sudah Ditandatangani
                                                @else
                                                    Surat Siap Untuk Ditandatangani
                                                @endif
                                            </h6>
                                            <small class="text-muted">File format: {{ pathinfo($letter->file, PATHINFO_EXTENSION) }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <a href="{{ asset('storage/files/signed-letters/' . $letter->file_signed) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                            <i class="ri-eye-line"></i> Lihat
                                        </a>
                                        @if($letter->request_status == 'completed')
                                            <button wire:click="downloadSignedLetter" class="btn btn-success btn-sm">
                                                <i class="ri-download-line"></i> Download
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Riwayat Status --}}
                @if($letter->statusHistory->count() > 0)
                    <div class="mt-4">
                        <h6 class="mb-3">Riwayat Status</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Status Sebelum</th>
                                        <th>Status Sesudah</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($letter->statusHistory as $history)
                                        <tr>
                                            <td>{{ $history->changed_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                @if($history->previous_status)
                                                    <span class="badge bg-secondary">{{ ucfirst($history->previous_status) }}</span>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td><span class="badge bg-primary">{{ ucfirst($history->new_status) }}</span></td>
                                            <td>{{ $history->remarks ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                {{-- Catatan Admin --}}
                @if($letter->admin_notes)
                    <div class="mt-4">
                        <div class="card border border-info">
                            <div class="card-header bg-info-subtle">
                                <h6 class="mb-0 text-info">Catatan Sekretaris</h6>
                            </div>
                            <div class="card-body">
                                {{ $letter->admin_notes }}
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Action Buttons --}}
                @if($letter->request_status == 'processing')
                    <div class="mt-4">
                        <button type="button" wire:click="toggleSignForm" class="btn btn-success btn-lg">
                            <i class="ri-quill-pen-line"></i> Tandatangani Surat
                        </button>
                    </div>
                @endif

                {{-- Sign Confirmation --}}
                @if($showSignForm)
                    <div class="mt-4">
                        <div class="card border border-success">
                            <div class="card-header bg-success-subtle">
                                <h6 class="mb-0 text-success">
                                    <i class="ri-quill-pen-line"></i> Konfirmasi Penandatanganan Surat
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-warning" role="alert">
                                    <i class="ri-alert-line"></i>
                                    <strong>Perhatian!</strong> Setelah surat ditandatangani, status akan berubah menjadi "Selesai" dan tidak dapat diubah lagi.
                                </div>

                                <p class="mb-3">Apakah Anda yakin ingin menandatangani surat ini?</p>

                                <div class="d-flex gap-2">
                                    <button wire:click="signLetter" class="btn btn-success">
                                        <i class="ri-check-line"></i> Ya, Tandatangani Surat
                                    </button>
                                    <button wire:click="toggleSignForm" class="btn btn-secondary">
                                        Batal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Completion Info --}}
                @if($letter->request_status == 'completed')
                    <div class="mt-4">
                        <div class="card border border-success">
                            <div class="card-body text-center">
                                <i class="ri-check-double-line display-4 text-success"></i>
                                <h5 class="text-success mt-3">Surat Telah Ditandatangani</h5>
                                <p class="text-muted">Surat telah selesai diproses dan dapat diunduh oleh pemohon</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

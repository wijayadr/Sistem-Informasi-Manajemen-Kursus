<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Detail Verifikasi Surat - {{ $letter->tracking_number }}</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('admin.letters.secretary.index') }}" class="btn btn-primary">
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
                                        @if($letter->request_status == 'submitted')
                                            <span class="badge bg-warning">Menunggu Verifikasi</span>
                                        @elseif($letter->request_status == 'processing')
                                            <span class="badge bg-info">Sudah Diverifikasi</span>
                                        @elseif($letter->request_status == 'rejected')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pengajuan</td>
                                    <td>: {{ $letter->submitted_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                @if($letter->file)
                                    <tr>
                                        <td>File Surat</td>
                                        <td>: <a href="{{ asset('storage/' . $letter->file) }}" target="_blank" class="text-primary">Lihat File</a></td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>

                    {{-- Dokumen Yang Diupload --}}
                    @if($letter->uploadedDocuments->count() > 0)
                        <div class="mt-4">
                            <h6 class="mb-3">Dokumen Pendukung</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Jenis Dokumen</th>
                                            <th>Nama File</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($letter->uploadedDocuments as $doc)
                                            <tr>
                                                <td>{{ $doc->documentType->document_name }}</td>
                                                <td>{{ $doc->original_filename }}</td>
                                                <td>
                                                    <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                        <i class="ri-eye-line"></i> Lihat
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

                    {{-- Action Buttons --}}
                    @if($letter->request_status == 'submitted')
                        <div class="mt-4 d-flex gap-2">
                            <button type="button" wire:click="toggleVerifyForm" class="btn btn-success">
                                <i class="ri-check-line"></i> Verifikasi Surat
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#rejectModal" class="btn btn-danger">
                                <i class="ri-close-line"></i> Tolak Pengajuan
                            </button>
                        </div>
                    @endif

                    {{-- Verify Form --}}
                    @if($showVerifyForm)
                        <div class="mt-4">
                            <div class="card border border-success">
                                <div class="card-header bg-success-subtle">
                                    <h6 class="mb-0 text-success">
                                        <i class="ri-upload-2-line"></i> Upload Surat Yang Sudah Diverifikasi
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <form wire:submit.prevent="verifyLetter">
                                        <div class="mb-3">
                                            <label for="verifiedFile" class="form-label">File Surat (PDF/DOC/DOCX)</label>
                                            <input type="file" wire:model="verifiedFile" class="form-control" accept=".pdf,.doc,.docx">
                                            @error('verifiedFile') <span class="text-danger">{{ $message }}</span> @enderror

                                            @if($verifiedFile)
                                                <div class="mt-2">
                                                    <small class="text-success">File terpilih: {{ $verifiedFile->getClientOriginalName() }}</small>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label for="adminNotes" class="form-label">Catatan Verifikasi</label>
                                            <textarea wire:model="adminNotes" class="form-control" rows="3" placeholder="Masukkan catatan verifikasi..."></textarea>
                                            @error('adminNotes') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-success">
                                                <i class="ri-check-line"></i> Simpan Verifikasi
                                            </button>
                                            <button type="button" wire:click="toggleVerifyForm" class="btn btn-secondary">
                                                Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Admin Notes Display --}}
                    @if($letter->admin_notes && $letter->request_status != 'submitted')
                        <div class="mt-4">
                            <div class="card border border-info">
                                <div class="card-header bg-info-subtle">
                                    <h6 class="mb-0 text-info">Catatan Admin</h6>
                                </div>
                                <div class="card-body">
                                    {{ $letter->admin_notes }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Reject Modal --}}
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tolak Pengajuan Surat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form wire:submit.prevent="rejectLetter">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="adminNotes" class="form-label">Alasan Penolakan <span class="text-danger">*</span></label>
                            <textarea wire:model="adminNotes" class="form-control" rows="4" placeholder="Masukkan alasan penolakan..." required></textarea>
                            @error('adminNotes') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Tolak Pengajuan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

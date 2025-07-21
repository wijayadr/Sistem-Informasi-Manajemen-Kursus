<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Detail Surat - {{ $letter->tracking_number }}</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('admin.letters.index') }}" class="btn btn-primary">
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
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="letterList">
            <div class="card-header border-bottom-dashed">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Penandatanganan Surat - Kepala Desa</h5>
                    <div class="flex-shrink-0">
                        <div class="d-flex gap-2 flex-wrap">
                            <select wire:model.live="status" class="form-select">
                                <option value="">Semua Status</option>
                                <option value="submitted">Menunggu Verifikasi</option>
                                <option value="processing">Sudah Diverifikasi</option>
                                <option value="rejected">Ditolak</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0 border-bottom border-bottom-dashed">
                <div class="search-box">
                    <input type="text" wire:model.live.debounce.150ms="search" class="form-control search border-0 py-3" placeholder="Cari nomor tracking atau nama pemohon...">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap" id="letterTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="text-center text-uppercase" style="width: 60px;">No</th>
                                    <th class="text-uppercase">No. Tracking</th>
                                    <th class="text-uppercase">Jenis Surat</th>
                                    <th class="text-uppercase">Pemohon</th>
                                    <th class="text-uppercase">Tanggal Pengajuan</th>
                                    <th class="text-uppercase">Status</th>
                                    <th class="text-uppercase" style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="letter-list-data">
                                @forelse($letters as $key => $letter)
                                    <tr wire:key="{{ $letter->id }}">
                                        <td class="text-center">
                                            {{ $letters->firstItem() + $loop->index }}
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">{{ $letter->tracking_number }}</span>
                                        </td>
                                        <td>{{ $letter->letterType->letter_name }}</td>
                                        <td>
                                            <div>
                                                <strong>{{ $letter->applicant_name }}</strong>
                                                @if($letter->phone_number)
                                                    <br><small class="text-muted">{{ $letter->phone_number }}</small>
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{ $letter->submitted_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <span class="badge bg-info">Siap Ditandatangani</span>
                                        </td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Detail">
                                                    <a href="{{ route('admin.letters.head-village.detail', $letter->id) }}" class="text-primary d-inline-block">
                                                        <i class="ri-eye-fill fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <div class="d-flex justify-content-center align-items-center flex-column">
                                                <i class="ri-inbox-line display-4 text-muted"></i>
                                                <p class="text-muted mt-2">Tidak ada surat yang siap ditandatangani</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $letters->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

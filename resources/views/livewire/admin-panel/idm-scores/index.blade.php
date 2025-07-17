<div class="row">
    <div class="col-lg-12">
        <div class="card" id="idmScoreList">
            <div class="card-header border-bottom-dashed">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Data IDM Score</h5>
                    <div class="flex-shrink-0">
                        <div class="d-flex gap-2 flex-wrap">
                            <x-button buttonType="info" wire:click.prevent="openModal" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal">
                                <i class="ri-add-line align-bottom me-1"></i>
                                Tambah
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0 border-bottom border-bottom-dashed">
                <div class="row g-3 p-3">
                    <div class="col-md-6">
                        <select wire:model.live="yearFilter" class="form-select">
                            <option value="">Semua Tahun</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select wire:model.live="statusFilter" class="form-select">
                            <option value="">Semua Status</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div>
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap" id="idmScoreTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="text-center text-uppercase" style="width: 60px;">No</th>
                                    <th class="text-uppercase text-center">Tahun</th>
                                    <th class="text-uppercase text-center">
                                        IKS
                                        <div>
                                            <small class="text-muted">(Indeks Ketahanan Sosial)</small>
                                        </div>
                                    </th>
                                    <th class="text-uppercase text-center">
                                        IKE
                                        <div>
                                            <small class="text-muted">(Indeks Ketahanan Ekonomi)</small>
                                        </div>
                                    </th>
                                    <th class="text-uppercase text-center">
                                        IKS
                                        <div>
                                            <small class="text-muted">(Indeks Ketahanan Lingkungan)</small>
                                        </div>
                                    </th>
                                    <th class="text-uppercase text-center">IDM Score</th>
                                    <th class="text-uppercase text-center">Status</th>
                                    <th class="text-uppercase text-center" style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="idm-score-list-data">
                                @forelse($idmScores as $key => $idmScore)
                                    <tr wire:key="{{ $idmScore->id }}">
                                        <td class="text-center">
                                            {{ $idmScores->firstItem() + $loop->index }}
                                        </td>
                                        <td class="text-center">{{ $idmScore->year }}</td>
                                        <td class="text-center">{{ number_format($idmScore->iks, 3) }}</td>
                                        <td class="text-center">{{ number_format($idmScore->ike, 3) }}</td>
                                        <td class="text-center">{{ number_format($idmScore->ikl, 3) }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-primary">{{ number_format($idmScore->idm_score, 3) }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-{{ $idmScore->status_color }}">{{ $idmScore->idm_status }}</span>
                                        </td>
                                        <td class="text-center">
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                    <a href="javascript:void(0)" class="text-primary d-inline-block" data-bs-toggle="modal" data-bs-target="#showModal" wire:click="edit('{{ $idmScore->id }}')">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Hapus">
                                                    <a href="javascript:void(0)" class="text-danger d-inline-block remove-item-btn" wire:click="deleteConfirm('delete', '{{ $idmScore->id }}')">
                                                        <i class="ri-delete-bin-5-fill fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <x-empty-data :colspan="9" />
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <x-pagination :items="$idmScores" />
                </div>
            </div>
        </div>

        {{-- Modal Tambah/Edit --}}
        <x-modal name="showModal" :title="$mode == 'add' ? 'Tambah Data IDM Score' : 'Edit Data IDM Score'" :maxWidth="'xl'">
            <form wire:submit.prevent="{{ $mode == 'add' ? 'save' : 'update'}}" class="tablelist-form" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-input-label for="year" value="Tahun" required />
                                <select wire:model="form.year" id="year" class="form-select @error('form.year') is-invalid @enderror">
                                    <option value="">Pilih Tahun</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('form.year')"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <x-input-label for="iks" value="IKS (Indeks Ketahanan Sosial)" required />
                                <x-text-input wire:model.live="form.iks" type="number" id="iks" step="0.0001" min="0" max="1" placeholder="0.000" :error="$errors->get('form.iks')" />
                                <x-input-error :messages="$errors->get('form.iks')"/>
                                <small class="text-muted">Nilai antara 0 - 1</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <x-input-label for="ike" value="IKE (Indeks Ketahanan Ekonomi)" required />
                                <x-text-input wire:model.live="form.ike" type="number" id="ike" step="0.0001" min="0" max="1" placeholder="0.000" :error="$errors->get('form.ike')" />
                                <x-input-error :messages="$errors->get('form.ike')"/>
                                <small class="text-muted">Nilai antara 0 - 1</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <x-input-label for="ikl" value="IKL (Indeks Ketahanan Lingkungan)" required />
                                <x-text-input wire:model.live="form.ikl" type="number" id="ikl" step="0.0001" min="0" max="1" placeholder="0.000" :error="$errors->get('form.ikl')" />
                                <x-input-error :messages="$errors->get('form.ikl')"/>
                                <small class="text-muted">Nilai antara 0 - 1</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-input-label for="idm_score" value="IDM Score (Indeks Desa Membangun)" required />
                                <x-text-input wire:model="form.idm_score" type="number" id="idm_score" step="0.001" min="0" max="1" placeholder="0.000" :error="$errors->get('form.idm_score')" readonly />
                                <x-input-error :messages="$errors->get('form.idm_score')"/>
                                <small class="text-muted">Otomatis dihitung: IDM = 1/3 (IKS + IKE + IKL)</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-input-label for="idm_status" value="Status IDM" required />
                                <select wire:model="form.idm_status" id="idm_status" class="form-select @error('form.idm_status') is-invalid @enderror" disabled>
                                    <option value="">Pilih Status</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('form.idm_status')"/>
                                <small class="text-muted">
                                    Status berdasarkan IDM Score:<br>
                                    • Sangat Tertinggal: < 0.491<br>
                                    • Tertinggal: 0.491 - 0.599<br>
                                    • Berkembang: 0.599 - 0.707<br>
                                    • Maju: 0.707 - 0.815<br>
                                    • Mandiri: > 0.815
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <x-secondary-button data-bs-dismiss="modal" wire:click="cancelEdit">
                            Batal
                        </x-secondary-button>
                        <x-primary-button type="submit">
                            {{ $mode == 'add' ? 'Simpan' : 'Update' }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </x-modal>
    </div>
</div>

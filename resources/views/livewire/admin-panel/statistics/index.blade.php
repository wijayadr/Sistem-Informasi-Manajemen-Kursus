<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 class="card-title mb-0">Statistik Data</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <button type="button" class="btn btn-primary" wire:click="create">
                                <i class="ri-add-line align-bottom me-1"></i> Tambah Statistik
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Filter dan Search -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="Cari..." wire:model.live="search">
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" wire:model.live="filterType">
                                <option value="">Semua Tipe</option>
                                @foreach($types as $type)
                                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" wire:model.live="filterYear">
                                <option value="">Semua Tahun</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-outline-secondary" wire:click="resetFilters">
                                Reset Filter
                            </button>
                        </div>
                    </div>

                    <!-- Tabel Data -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tipe</th>
                                    <th>Tahun</th>
                                    <th>Chart Type</th>
                                    <th>Total Data</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($statistics as $statistic)
                                    <tr>
                                        <td>{{ $loop->iteration + ($statistics->currentPage() - 1) * $statistics->perPage() }}</td>
                                        <td>{{ $statistic->name }}</td>
                                        <td>
                                            <span class="badge bg-primary">{{ ucfirst($statistic->type) }}</span>
                                        </td>
                                        <td>{{ $statistic->year ?? '-' }}</td>
                                        <td>
                                            <span class="badge bg-info">{{ ucfirst($statistic->chart_type) }}</span>
                                        </td>
                                        <td>{{ $statistic->total_value }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                       @checked($statistic->is_active)
                                                       wire:click="toggleActive({{ $statistic->id }})">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-soft-secondary btn-sm dropdown-toggle"
                                                        type="button" data-bs-toggle="dropdown">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="#" wire:click="edit({{ $statistic->id }})">
                                                            <i class="ri-pencil-fill align-bottom me-2"></i> Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger" href="#"
                                                           wire:click="delete({{ $statistic->id }})">
                                                            <i class="ri-delete-bin-fill align-bottom me-2"></i> Hapus
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="ri-search-line fs-1"></i>
                                                <p class="mt-2">Tidak ada data statistik ditemukan</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-end">
                        {{ $statistics->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    @if($showModal)
        <div class="modal fade show" style="display: block;" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $editMode ? 'Edit' : 'Tambah' }} Statistik</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <form wire:submit.prevent="save">
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nama Statistik</label>
                                    <input type="text" class="form-control @error('form.name') is-invalid @enderror"
                                           wire:model="form.name" id="name" placeholder="Masukkan nama statistik">
                                    @error('form.name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Tipe</label>
                                    <input type="text" class="form-control @error('form.type') is-invalid @enderror"
                                           wire:model="form.type" id="type" placeholder="Masukkan tipe statistik">
                                    @error('form.type')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="year" class="form-label">Tahun</label>
                                    <input type="number" class="form-control @error('form.year') is-invalid @enderror"
                                           wire:model="form.year" id="year" min="2000" max="2100">
                                    @error('form.year')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="chart_type" class="form-label">Tipe Chart</label>
                                    <select class="form-select @error('form.chart_type') is-invalid @enderror"
                                            wire:model="form.chart_type" id="chart_type">
                                        <option value="bar">Bar Chart</option>
                                        <option value="pie">Pie Chart</option>
                                        <option value="line">Line Chart</option>
                                        <option value="doughnut">Doughnut Chart</option>
                                    </select>
                                    @error('form.chart_type')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea class="form-control @error('form.description') is-invalid @enderror"
                                              wire:model="form.description" id="description" rows="3"
                                              placeholder="Masukkan deskripsi statistik"></textarea>
                                    @error('form.description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" wire:model="form.is_active" id="is_active">
                                        <label class="form-check-label" for="is_active">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Kategori -->
                            <div class="mt-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="mb-0">Kategori Data</h6>
                                    <button type="button" class="btn btn-sm btn-outline-primary" wire:click="addCategory">
                                        <i class="ri-add-line me-1"></i> Tambah Kategori
                                    </button>
                                </div>

                                @foreach($form->categories as $index => $category)
                                    <div class="row g-2 mb-2 align-items-end">
                                        <div class="col-md-5">
                                            <label class="form-label">Kategori</label>
                                            <input type="text" class="form-control @error('form.categories.'.$index.'.category') is-invalid @enderror"
                                                   wire:model="form.categories.{{ $index }}.category"
                                                   placeholder="Nama kategori">
                                            @error('form.categories.'.$index.'.category')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Nilai</label>
                                            <input type="number" class="form-control @error('form.categories.'.$index.'.value') is-invalid @enderror"
                                                   wire:model="form.categories.{{ $index }}.value"
                                                   min="0" placeholder="0">
                                            @error('form.categories.'.$index.'.value')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Warna</label>
                                            <input type="color" class="form-control form-control-color"
                                                   wire:model="form.categories.{{ $index }}.color"
                                                   title="Pilih warna">
                                        </div>
                                        <div class="col-md-1">
                                            @if(count($form->categories) > 1)
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                        wire:click="removeCategory({{ $index }})">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                @error('form.categories')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                {{ $editMode ? 'Perbarui' : 'Simpan' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif
</div>

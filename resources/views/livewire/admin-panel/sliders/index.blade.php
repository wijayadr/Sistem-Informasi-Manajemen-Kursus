<div class="row">
    <div class="col-lg-12">
        <div class="card" id="sliderList">
            <div class="card-header border-bottom-dashed">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Data Slider</h5>
                    <div class="flex-shrink-0">
                        <div class="d-flex gap-2 flex-wrap">
                            <x-button buttonType="info" wire:click.prevent="openModal" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal">
                                <i class="ri-add-line align-bottom me-1"></i>
                                Tambah
                            </x-button>
                            <x-button buttonType="secondary" wire:click="reorderSliders">
                                <i class="ri-sort-desc align-bottom me-1"></i>
                                Reorder
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0 border-bottom border-bottom-dashed">
                <div class="search-box">
                    <input type="text" wire:model.live.debounce.150ms="search" class="form-control search border-0 py-3" placeholder="Pencarian slider ...">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap" id="sliderTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="text-center text-uppercase" style="width: 60px;">No</th>
                                    <th class="text-uppercase" style="width: 100px;">Gambar</th>
                                    <th class="text-uppercase">Judul</th>
                                    <th class="text-uppercase">Subtitle</th>
                                    <th class="text-uppercase" style="width: 120px;">Urutan</th>
                                    <th class="text-uppercase text-center" style="width: 100px;">Status</th>
                                    <th class="text-uppercase text-center" style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="slider-list-data">
                                @forelse($sliders as $key => $slider)
                                    <tr wire:key="{{ $slider->id }}">
                                        <td class="text-center">
                                            {{ $sliders->firstItem() + $loop->index }}
                                        </td>
                                        <td>
                                            <div class="avatar-sm">
                                                <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}" class="img-thumbnail">
                                            </div>
                                        </td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->subtitle ?? '-' }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-secondary">{{ $slider->sort_order }}</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check form-switch form-switch-sm">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                       wire:click="toggleActive({{ $slider->id }})"
                                                       {{ $slider->is_active ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                    <a href="javascript:void(0)" class="text-primary d-inline-block" data-bs-toggle="modal" data-bs-target="#showModal" wire:click="edit('{{ $slider->id }}')">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Hapus">
                                                    <a href="javascript:void(0)" class="text-danger d-inline-block remove-item-btn" wire:click="deleteConfirm('delete', '{{ $slider->id }}')">
                                                        <i class="ri-delete-bin-5-fill fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <x-empty-data :colspan="7" />
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <x-pagination :items="$sliders" />
                </div>
            </div>
        </div>

        {{-- Modal Tambah/Edit --}}
        <x-modal name="showModal" :title="$mode == 'add' ? 'Tambah Data Slider' : 'Edit Data Slider'" :maxWidth="'lg'">
            <form wire:submit.prevent="{{ $mode == 'add' ? 'save' : 'update'}}" class="tablelist-form" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-input-label for="title" value="Judul" required />
                                <x-text-input wire:model="form.title" type="text" id="title" placeholder="Judul Slider" :error="$errors->get('form.title')" />
                                <x-input-error :messages="$errors->get('form.title')"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-input-label for="subtitle" value="Subtitle" />
                                <x-text-input wire:model="form.subtitle" type="text" id="subtitle" placeholder="Subtitle Slider" :error="$errors->get('form.subtitle')" />
                                <x-input-error :messages="$errors->get('form.subtitle')"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-input-label for="image_path" value="Gambar" :required="$mode == 'add'" />
                                <input type="file" wire:model="form.image_path" id="image_path" class="form-control" accept="image/*">
                                <x-input-error :messages="$errors->get('form.image_path')"/>
                                @if($mode == 'edit' && $form->slider && $form->slider->image_path)
                                    <div class="mt-2">
                                        <img src="{{ $form->slider->image_url }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-input-label for="link_url" value="Link URL" />
                                <x-text-input wire:model="form.link_url" type="url" id="link_url" placeholder="https://example.com" :error="$errors->get('form.link_url')" />
                                <x-input-error :messages="$errors->get('form.link_url')"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-input-label for="sort_order" value="Urutan" />
                                <x-text-input wire:model="form.sort_order" type="number" id="sort_order" placeholder="0" :error="$errors->get('form.sort_order')" />
                                <small class="text-muted">Jika urutan sudah ada, slider lain akan otomatis bergeser</small>
                                <x-input-error :messages="$errors->get('form.sort_order')"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-input-label for="is_active" value="Status" />
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" role="switch" id="is_active" wire:model="form.is_active">
                                    <label class="form-check-label" for="is_active">Aktif</label>
                                </div>
                                <x-input-error :messages="$errors->get('form.is_active')"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <x-secondary-button data-bs-dismiss="modal" wire:click="cancelEdit">
                            Close
                        </x-secondary-button>
                        <x-primary-button type="submit">
                            Simpan
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </x-modal>
    </div>
</div>

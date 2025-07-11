<div class="row">
    <div class="col-lg-12">
        <div class="card" id="regulationList">
            <div class="card-header border-bottom-dashed">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Data Regulasi</h5>
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
                <div class="search-box">
                    <input type="text" wire:model.live.debounce.150ms="search" class="form-control search border-0 py-3" placeholder="Pencarian regulasi ...">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap" id="regulationTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="text-center text-uppercase" style="width: 60px;">No</th>
                                    <th class="text-uppercase">Judul</th>
                                    <th class="text-uppercase">Kategori</th>
                                    <th class="text-uppercase">Tipe Dokumen</th>
                                    <th class="text-uppercase">Deskripsi</th>
                                    <th class="text-uppercase" style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="regulation-list-data">
                                @forelse($regulations as $key => $regulation)
                                    <tr wire:key="{{ $regulation->id }}">
                                        <td class="text-center">
                                            {{ $regulations->firstItem() + $loop->index }}
                                        </td>
                                        <td>{{ $regulation->title }}</td>
                                        <td>
                                            <span class="badge bg-info">{{ $regulation->category->name ?? '-' }}</span>
                                        </td>
                                        <td>
                                            @if($regulation->document_type === 'file')
                                                <span class="badge bg-success">File</span>
                                            @else
                                                <span class="badge bg-warning">Link</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="text-truncate" style="max-width: 200px;" title="{{ $regulation->description }}">
                                                {{ Str::limit($regulation->description, 50) }}
                                            </div>
                                        </td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                @if($regulation->document_type === 'file')
                                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Download">
                                                        <a href="{{ Storage::url('files/regulations/' . $regulation->document_value) }}" class="text-success d-inline-block" target="_blank">
                                                            <i class="ri-download-2-line fs-16"></i>
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Buka Link">
                                                        <a href="{{ $regulation->document_value }}" class="text-success d-inline-block" target="_blank">
                                                            <i class="ri-external-link-line fs-16"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                                <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                    <a href="javascript:void(0)" class="text-primary d-inline-block" data-bs-toggle="modal" data-bs-target="#showModal" wire:click="edit('{{ $regulation->id }}')">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Hapus">
                                                    <a href="javascript:void(0)" class="text-danger d-inline-block remove-item-btn" wire:click="deleteConfirm('delete', '{{ $regulation->id }}')">
                                                        <i class="ri-delete-bin-5-fill fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <x-empty-data :colspan="6" />
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <x-pagination :items="$regulations" />
                </div>
            </div>
        </div>

        {{-- Modal Tambah/Edit --}}
        <x-modal name="showModal" :title="$mode == 'add' ? 'Tambah Data Regulasi' : 'Edit Data Regulasi'" size="lg">
            <form wire:submit.prevent="{{ $mode == 'add' ? 'save' : 'update'}}" class="tablelist-form" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-input-label for="regulation_category_id" value="Kategori Regulasi" required />
                                <x-select-list class="w-full" id="regulation_category_id" name="regulation_category_id" :options="$this->listsForFields['categories']" wire:model="form.regulation_category_id" data-placeholder="-- Pilih Kategori --"/>
                                <x-input-error :messages="$errors->get('form.regulation_category_id')"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-input-label for="document_type" value="Tipe Dokumen" required />
                                <x-select-list class="w-full" id="document_type" name="document_type" :options="$this->listsForFields['document_types']" wire:model="form.document_type" data-placeholder="-- Pilih Tipe Dokumen --"/>
                                <x-input-error :messages="$errors->get('form.document_type')"/>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <x-input-label for="title" value="Judul" required />
                        <x-text-input wire:model="form.title" type="text" id="title" placeholder="Judul Regulasi" :error="$errors->get('form.title')" />
                        <x-input-error :messages="$errors->get('form.title')"/>
                    </div>

                    <div class="mb-3">
                        @if($form->document_type === 'file')
                            <x-input-label for="document_value" value="Upload File" required />
                            <input type="file" wire:model="form.document_value" id="document_value" class="form-control @error('form.document_value') is-invalid @enderror" accept=".pdf,.doc,.docx">
                            <small class="text-muted">Format: PDF, DOC, DOCX. Maksimal 2MB</small>
                            {{-- @if($form->document_value)
                                <div class="mt-2">
                                    <small class="text-success">File dipilih: {{ $form->document_value->getClientOriginalName() }}</small>
                                </div>
                            @endif --}}
                        @elseif($form->document_type === 'url')
                            <x-input-label for="document_value" value="Link/URL" required />
                            <x-text-input wire:model="form.document_value" type="url" id="document_value" placeholder="https://example.com/document" :error="$errors->get('form.document_value')" />
                        @endif
                        <x-input-error :messages="$errors->get('form.document_value')"/>
                    </div>

                    <div class="mb-3">
                        <x-input-label for="description" value="Deskripsi" required />
                        <textarea wire:model="form.description" id="description" class="form-control @error('form.description') is-invalid @enderror" rows="4" placeholder="Deskripsi regulasi"></textarea>
                        <x-input-error :messages="$errors->get('form.description')"/>
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

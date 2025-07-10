<div class="row">
    <div class="col-lg-12">
        <div class="card" id="eventList">
            <div class="card-header border-bottom-dashed">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Agenda</h5>
                    <div class="flex-shrink-0">
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('admin.events.create') }}" class="btn btn-info w-100 waves-effect waves-light">
                                <i class="ri-add-line align-bottom me-1"></i>
                                Tambah
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0 border-bottom border-bottom-dashed">
                <div class="search-box">
                    <input type="text" wire:model.live.debounce.150ms="search" class="form-control search border-0 py-3" placeholder="Pencarian event ...">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap" id="eventTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="text-center text-uppercase" style="width: 60px;">No</th>
                                    <th class="text-uppercase">Nama Agenda</th>
                                    <th scope="text-uppercase">Tempat</th>
                                    <th scope="text-uppercase">Waktu</th>
                                    <th scope="text-uppercase">Deskripsi</th>
                                    <th class="text-uppercase">Gambar</th>
                                    <th class="text-uppercase" style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="event-list-data">
                                @forelse($events as $key => $event)
                                    <tr wire:key="{{ $event->id }}">
                                        <td class="text-center">
                                            {{ $events->firstItem() + $loop->index }}
                                        </td>
                                        <td>
                                            {{ $event->name }}
                                        </td>
                                        <td>{{ $event->location }}</td>
                                        <td>
                                            <p class="my-1 fw-normal">{{ date_indo($event->start_time) }} - {{ date_indo($event->end_time) }}</p>
                                        </td>
                                        <td>{{ $event->description }}</td>
                                        <td>
                                            <a href="{{ asset('storage/images/events/' . $event->image) }}" target="_blank" class="text-primary">Lihat</a>
                                        </td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                    <a href="{{ route('admin.events.edit', $event) }}" class="text-primary d-inline-block">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Hapus">
                                                    <a href="javascript:void(0)" class="text-danger d-inline-block remove-item-btn" wire:click="deleteConfirm('delete', '{{ $event->id }}')">
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

                    <x-pagination :items="$events" />
                </div>
            </div>
        </div>
    </div>
</div>

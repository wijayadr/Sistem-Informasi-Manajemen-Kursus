<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="{{ $editing ? 'edit' : 'save' }}" class="tablelist-form" autocomplete="off">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <x-input-label for="name" value="Nama Agenda" required/>
                                <x-text-input wire:model="form.name" type="text" id="name" placeholder="Nama Agenda" :error="$errors->get('form.name')" />
                                <x-input-error :messages="$errors->get('form.name')"/>
                            </div>

                            <div class="col-lg-12">
                                <x-input-label for="description" value="Deskripsi" required/>
                                <x-textarea wire:model="form.description" id="description" placeholder="Deskripsi" :error="$errors->get('form.description')" rows="3" />
                                <x-input-error :messages="$errors->get('form.description')"/>
                            </div>

                            <div class="col-lg-12">
                                <x-input-label for="location" value="Tempat" />
                                <x-text-input wire:model="form.location" type="text" id="location" placeholder="Tempat" :error="$errors->get('form.location')" />
                                <x-input-error :messages="$errors->get('form.location')"/>
                            </div>

                            <div class="col-lg-6">
                                <x-input-label for="start_time" value="Tanggal Mulai" required />
                                <div class="form-icon" wire:ignore>
                                    <x-flatpickr wire:model="form.start_time" class="form-control-icon" type="text" id="start_time" placeholder="Tanggal Mulai" :error="$errors->get('form.start_time')" data-provider="flatpickr" :time=true/>
                                    <i class="ri-calendar-line"></i>
                                </div>
                                <x-input-error :messages="$errors->get('form.start_time')"/>
                            </div>

                            <div class="col-lg-6">
                                <x-input-label for="end_time" value="Tanggal Selesai" required />
                                <div class="form-icon" wire:ignore>
                                    <x-flatpickr wire:model="form.end_time" class="form-control-icon" type="text" id="end_time" placeholder="Tanggal Selesai" :error="$errors->get('form.end_time')" data-provider="flatpickr" :time=true/>
                                    <i class="ri-calendar-line"></i>
                                </div>
                                <x-input-error :messages="$errors->get('form.end_time')"/>
                            </div>

                            <div class="col-lg-12">
                                <x-input-label for="image" value="Banner Kegiatan" required/>
                                <input type="file" wire:model="form.image" class="form-control" placeholder="Masukkan Gambar Agenda"  />
                                <x-input-error :messages="$errors->get('form.image')"/>
                            </div>

                            <div class="col-lg-12">
                                <div class="text-end">
                                    <x-primary-button type="submit">
                                        Simpan
                                    </x-primary-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

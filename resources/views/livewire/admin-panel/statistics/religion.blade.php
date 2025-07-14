<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data Statistik Agama</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="edit" class="tablelist-form" autocomplete="off">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label for="islam" class="form-label">Islam <span class="text-danger">*</span></label>
                                <input type="number" wire:model="form.islam" class="form-control @error('form.islam') is-invalid @enderror" id="islam" min="0" placeholder="Jumlah pemeluk Islam">
                                @error('form.islam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="christian" class="form-label">Kristen <span class="text-danger">*</span></label>
                                <input type="number" wire:model="form.christian" class="form-control @error('form.christian') is-invalid @enderror" id="christian" min="0" placeholder="Jumlah pemeluk Kristen">
                                @error('form.christian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="catholic" class="form-label">Katolik <span class="text-danger">*</span></label>
                                <input type="number" wire:model="form.catholic" class="form-control @error('form.catholic') is-invalid @enderror" id="catholic" min="0" placeholder="Jumlah pemeluk Katolik">
                                @error('form.catholic')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="hindu" class="form-label">Hindu <span class="text-danger">*</span></label>
                                <input type="number" wire:model="form.hindu" class="form-control @error('form.hindu') is-invalid @enderror" id="hindu" min="0" placeholder="Jumlah pemeluk Hindu">
                                @error('form.hindu')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="buddhist" class="form-label">Buddha <span class="text-danger">*</span></label>
                                <input type="number" wire:model="form.buddhist" class="form-control @error('form.buddhist') is-invalid @enderror" id="buddhist" min="0" placeholder="Jumlah pemeluk Buddha">
                                @error('form.buddhist')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="confucian" class="form-label">Konghucu <span class="text-danger">*</span></label>
                                <input type="number" wire:model="form.confucian" class="form-control @error('form.confucian') is-invalid @enderror" id="confucian" min="0" placeholder="Jumlah pemeluk Konghucu">
                                @error('form.confucian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="others" class="form-label">Lainnya <span class="text-danger">*</span></label>
                                <input type="number" wire:model="form.others" class="form-control @error('form.others') is-invalid @enderror" id="others" min="0" placeholder="Jumlah pemeluk agama lainnya">
                                @error('form.others')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

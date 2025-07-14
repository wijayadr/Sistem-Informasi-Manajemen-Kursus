<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Statistik Pendidikan</h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="edit" class="tablelist-form" autocomplete="off">
                    <div class="row g-3">
                        <!-- Tidak/Belum Sekolah -->
                        <div class="col-lg-6">
                            <label for="no_school" class="form-label">Tidak/Belum Sekolah</label>
                            <input wire:model="form.no_school" type="number" class="form-control @error('form.no_school') is-invalid @enderror" id="no_school" placeholder="Masukkan Jumlah Tidak/Belum Sekolah">
                            @error('form.no_school')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Belum Tamat SD/Sederajat -->
                        <div class="col-lg-6">
                            <label for="not_finished_primary" class="form-label">Belum Tamat SD/Sederajat</label>
                            <input wire:model="form.not_finished_primary" type="number" class="form-control @error('form.not_finished_primary') is-invalid @enderror" id="not_finished_primary" placeholder="Masukkan Jumlah Belum Tamat SD/Sederajat">
                            @error('form.not_finished_primary')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Tamat SD/Sederajat -->
                        <div class="col-lg-6">
                            <label for="primary_graduate" class="form-label">Tamat SD/Sederajat</label>
                            <input wire:model="form.primary_graduate" type="number" class="form-control @error('form.primary_graduate') is-invalid @enderror" id="primary_graduate" placeholder="Masukkan Jumlah Tamat SD/Sederajat">
                            @error('form.primary_graduate')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- SLTP/Sederajat -->
                        <div class="col-lg-6">
                            <label for="junior_secondary" class="form-label">SLTP/Sederajat</label>
                            <input wire:model="form.junior_secondary" type="number" class="form-control @error('form.junior_secondary') is-invalid @enderror" id="junior_secondary" placeholder="Masukkan Jumlah SLTP/Sederajat">
                            @error('form.junior_secondary')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- SLTA/Sederajat -->
                        <div class="col-lg-6">
                            <label for="senior_secondary" class="form-label">SLTA/Sederajat</label>
                            <input wire:model="form.senior_secondary" type="number" class="form-control @error('form.senior_secondary') is-invalid @enderror" id="senior_secondary" placeholder="Masukkan Jumlah SLTA/Sederajat">
                            @error('form.senior_secondary')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Diploma I/II -->
                        <div class="col-lg-6">
                            <label for="diploma_i_ii" class="form-label">Diploma I/II</label>
                            <input wire:model="form.diploma_i_ii" type="number" class="form-control @error('form.diploma_i_ii') is-invalid @enderror" id="diploma_i_ii" placeholder="Masukkan Jumlah Diploma I/II">
                            @error('form.diploma_i_ii')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Akademi/Diploma III/S. Muda -->
                        <div class="col-lg-6">
                            <label for="diploma_iii" class="form-label">Akademi/Diploma III/S. Muda</label>
                            <input wire:model="form.diploma_iii" type="number" class="form-control @error('form.diploma_iii') is-invalid @enderror" id="diploma_iii" placeholder="Masukkan Jumlah Akademi/Diploma III/S. Muda">
                            @error('form.diploma_iii')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Diploma IV/Strata I -->
                        <div class="col-lg-6">
                            <label for="bachelor" class="form-label">Diploma IV/Strata I</label>
                            <input wire:model="form.bachelor" type="number" class="form-control @error('form.bachelor') is-invalid @enderror" id="bachelor" placeholder="Masukkan Jumlah Diploma IV/Strata I">
                            @error('form.bachelor')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Strata II -->
                        <div class="col-lg-6">
                            <label for="master" class="form-label">Strata II</label>
                            <input wire:model="form.master" type="number" class="form-control @error('form.master') is-invalid @enderror" id="master" placeholder="Masukkan Jumlah Strata II">
                            @error('form.master')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Strata III -->
                        <div class="col-lg-6">
                            <label for="doctorate" class="form-label">Strata III</label>
                            <input wire:model="form.doctorate" type="number" class="form-control @error('form.doctorate') is-invalid @enderror" id="doctorate" placeholder="Masukkan Jumlah Strata III">
                            @error('form.doctorate')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <!-- Submit Button -->
                        <div class="col-lg-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Perbarui</button>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

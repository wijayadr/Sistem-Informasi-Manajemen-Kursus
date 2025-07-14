<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Statistik Penduduk</h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="edit" class="tablelist-form" autocomplete="off">
                    <div class="row g-3">
                        <!-- Total Population -->
                        <div class="col-lg-6">
                            <label for="total_population" class="form-label">Total Penduduk</label>
                            <input wire:model="form.total_population" type="number" class="form-control @error('form.total_population') is-invalid @enderror" id="total_population" placeholder="Masukkan Total Penduduk">
                            @error('form.total_population')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Head of Family -->
                        <div class="col-lg-6">
                            <label for="head_of_family" class="form-label">Kepala Keluarga</label>
                            <input wire:model="form.head_of_family" type="number" class="form-control @error('form.head_of_family') is-invalid @enderror" id="head_of_family" placeholder="Masukkan Jumlah Kepala Keluarga">
                            @error('form.head_of_family')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Male -->
                        <div class="col-lg-6">
                            <label for="male" class="form-label">Laki-laki</label>
                            <input wire:model="form.male" type="number" class="form-control @error('form.male') is-invalid @enderror" id="male" placeholder="Masukkan Jumlah Laki-laki">
                            @error('form.male')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Female -->
                        <div class="col-lg-6">
                            <label for="female" class="form-label">Perempuan</label>
                            <input wire:model="form.female" type="number" class="form-control @error('form.female') is-invalid @enderror" id="female" placeholder="Masukkan Jumlah Perempuan">
                            @error('form.female')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Temporary Residents -->
                        <div class="col-lg-6">
                            <label for="temporary_residents" class="form-label">Penduduk Sementara</label>
                            <input wire:model="form.temporary_residents" type="number" class="form-control @error('form.temporary_residents') is-invalid @enderror" id="temporary_residents" placeholder="Masukkan Jumlah Penduduk Sementara">
                            @error('form.temporary_residents')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Population Mutation -->
                        <div class="col-lg-6">
                            <label for="population_mutation" class="form-label">Mutasi Penduduk</label>
                            <input wire:model="form.population_mutation" type="number" class="form-control @error('form.population_mutation') is-invalid @enderror" id="population_mutation" placeholder="Masukkan Jumlah Mutasi Penduduk">
                            @error('form.population_mutation')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Unmarried -->
                        <div class="col-lg-6">
                            <label for="unmarried" class="form-label">Belum Menikah</label>
                            <input wire:model="form.unmarried" type="number" class="form-control @error('form.unmarried') is-invalid @enderror" id="unmarried" placeholder="Masukkan Jumlah Belum Menikah">
                            @error('form.unmarried')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Married -->
                        <div class="col-lg-6">
                            <label for="married" class="form-label">Menikah</label>
                            <input wire:model="form.married" type="number" class="form-control @error('form.married') is-invalid @enderror" id="married" placeholder="Masukkan Jumlah Menikah">
                            @error('form.married')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Divorced Alive -->
                        <div class="col-lg-6">
                            <label for="divorced_alive" class="form-label">Cerai Hidup</label>
                            <input wire:model="form.divorced_alive" type="number" class="form-control @error('form.divorced_alive') is-invalid @enderror" id="divorced_alive" placeholder="Masukkan Jumlah Cerai Hidup">
                            @error('form.divorced_alive')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Divorced Dead -->
                        <div class="col-lg-6">
                            <label for="divorced_dead" class="form-label">Cerai Mati</label>
                            <input wire:model="form.divorced_dead" type="number" class="form-control @error('form.divorced_dead') is-invalid @enderror" id="divorced_dead" placeholder="Masukkan Jumlah Cerai Mati">
                            @error('form.divorced_dead')
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

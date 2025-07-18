<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Informasi Identitas Website</h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="edit" class="tablelist-form" autocomplete="off">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute end-0 bottom-0">
                                        <label for="logo-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                            <div class="avatar-xs cursor-pointer">
                                                <div class="avatar-title bg-light rounded-circle text-muted border">
                                                    <i class="ri-image-fill"></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input wire:ignore wire:model="form.logo" class="form-control d-none" value="" id="logo-input" type="file" accept="image/png, image/gif, image/jpeg">
                                    </div>
                                    <div class="avatar-lg p-1">
                                        <div class="avatar-title bg-light rounded-circle">
                                            <img wire:ignore src="{{ asset('velzon/images/users/user-dummy-img.jpg') }}" id="logo-img" class="avatar-md rounded-circle object-cover" />
                                        </div>
                                    </div>
                                </div>
                                <h5 class="fs-13 mt-3">Logo</h5>
                                <div wire:loading wire:target="form.logo">Uploading...</div>
                                <x-input-error :messages="$errors->get('form.logo')" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label for="name" class="form-label">Nama Website</label>
                            <input type="text" wire:model="form.name" class="form-control @error('form.name') is-invalid @enderror" placeholder="Masukkan Nama Website">
                            @error('form.name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea wire:model="form.description" class="form-control @error('form.phone') is-invalid @enderror" id="description" rows="3" placeholder="Masukkan Deskripsi"></textarea>
                            @error('form.description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input wire:model="form.phone" type="text" class="form-control @error('form.phone') is-invalid @enderror" id="phone" placeholder="Masukkan Nomor Telepon">
                            @error('form.phone')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="email" class="form-label">Email</label>
                            <input wire:model="form.email" type="text" class="form-control @error('form.email') is-invalid @enderror" id="email" placeholder="Masukkan Email">
                            @error('form.email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="text" wire:model="form.facebook" class="form-control @error('form.facebook') is-invalid @enderror" placeholder="Masukkan Facebook">
                            @error('form.facebook')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="text" wire:model="form.instagram" class="form-control @error('form.instagram') is-invalid @enderror" placeholder="Masukkan Instagram">
                            @error('form.instagram')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="twitter" class="form-label">Twitter</label>
                            <input type="text" wire:model="form.twitter" class="form-control @error('form.twitter') is-invalid @enderror" placeholder="Masukkan Twitter">
                            @error('form.twitter')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="youtube" class="form-label">Youtube</label>
                            <input type="text" wire:model="form.youtube" class="form-control @error('form.youtube') is-invalid @enderror" placeholder="Masukkan Youtube">
                            @error('form.youtube')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea wire:model="form.address" class="form-control @error('form.address') is-invalid @enderror" id="address" rows="3" placeholder="Masukkan Alamat"></textarea>
                            @error('form.address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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

@push('script')
    <script>
        document.addEventListener("livewire:init", () => {
            $('#logo-input').change(function(e) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#logo-img').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            Livewire.on('recentLogo', (logo) => {
                let recent_logo = "{{ asset('storage/images/identity/' . $form->logo) }}";
                if (recent_logo) {
                    $('#logo-img').attr('src', recent_logo);
                }
            });
        })
    </script>
@endpush

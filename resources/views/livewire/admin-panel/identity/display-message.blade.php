<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Teks Berjalan</h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="edit" class="tablelist-form" autocomplete="off">
                    <div class="row g-3">
                        <div wire:ignore class="col-lg-12">
                            <textarea
                                    id="display_message"
                                    wire:model="form.display_message"
                                    rows="5"
                                    class="form-control @error('form.display_message') is-invalid @enderror"
                                    name="display_message">
                            </textarea>
                            <x-input-error :messages="$errors->get('form.display_message')"/>
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

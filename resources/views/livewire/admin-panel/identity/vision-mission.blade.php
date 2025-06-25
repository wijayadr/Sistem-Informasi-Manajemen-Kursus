<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Visi Misi</h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="edit" class="tablelist-form" autocomplete="off">
                    <div class="row g-3">
                        <div wire:ignore class="col-lg-12">
                            <label for="vision" class="form-label">Visi</label>
                            <textarea
                                    id="vision"
                                    x-data="ckeditor()"
                                    x-init="init($wire.dispatch)"
                                    wire:key="ckEditor"
                                    x-ref="ckEditor"
                                    wire:model.debounce.9999999ms="form.vision"
                                    class="form-control @error('form.vision') is-invalid @enderror"
                                    name="vision">
                                </textarea>
                            <x-input-error :messages="$errors->get('form.vision')"/>
                        </div>
                        <div wire:ignore class="col-lg-12">
                            <label for="mission" class="form-label">Misi</label>
                            <textarea
                                    id="mission"
                                    x-data="ckeditor2()"
                                    x-init="init($wire.dispatch)"
                                    wire:key="ckEditor"
                                    x-ref="ckEditor"
                                    wire:model.debounce.9999999ms="form.mission"
                                    class="form-control @error('form.mission') is-invalid @enderror"
                                    name="mission">
                                </textarea>
                            <x-input-error :messages="$errors->get('form.mission')"/>
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

@push('style')
    <style>
        .ck-editor:nth-of-type(2) {
            display: none;
        }
    </style>
@endpush


@push('script')
    <script src="{{ asset('assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <script>
        function ckeditor() {
            return {
                /**
                 * The function creates the editor and returns its instance
                 * @param $dispatch Alpine's magic property
                 */
                create: async function($dispatch) {
                    console.log('create');
                    // Create the editor with the x-ref
                    const editor = await ClassicEditor.create(this.$refs.ckEditor, {
                        removePlugins: ['Image', 'ImageToolbar', 'ImageUpload', 'ImageCaption', 'ImageStyle', 'MediaEmbed', 'EasyImage', 'CKFinder'],
                        toolbar: [
                            'heading', '|',
                            'bold', 'italic', 'underline', 'strikethrough', '|',
                            'bulletedList', 'numberedList', '|',
                            'blockQuote', 'link', 'undo', 'redo'
                        ]
                    });
                    // Handle data updates
                    editor.model.document.on('change:data', function() {
                        $dispatch('form.vision', editor.getData())
                        @this.set('form.vision', editor.getData());
                    });

                    // return the editor
                    return editor;
                },
                /**
                 * Initilizes the editor and creates a listener to recreate it after a rerender
                 * @param $dispatch Alpine's magic property
                 */
                init: async function($dispatch) {
                    console.log('init');
                    // Get an editor instance
                    const editor = await this.create($dispatch);
                    // Set the initial data
                    editor.setData('{!! $form->vision !!}')
                    // Pass Alpine context to Livewire's
                    const $this = this;
                    // On reinit, destroy the old instance and create a new one
                    // Livewire.on('reinit', async function(e) {
                    //     editor.setData('');
                    //     editor.destroy()
                    //         .catch( error => {
                    //             console.log( error );
                    //         } );
                    //     await $this.create($dispatch);
                    // });
                }
            }
        }

        function ckeditor2() {
            return {
                /**
                 * The function creates the editor and returns its instance
                 * @param $dispatch Alpine's magic property
                 */
                create: async function($dispatch) {
                    console.log('create');
                    // Create the editor with the x-ref
                    const editor = await ClassicEditor.create(this.$refs.ckEditor, {
                        removePlugins: ['Image', 'ImageToolbar', 'ImageUpload', 'ImageCaption', 'ImageStyle', 'MediaEmbed', 'EasyImage', 'CKFinder'],
                        toolbar: [
                            'heading', '|',
                            'bold', 'italic', 'underline', 'strikethrough', '|',
                            'bulletedList', 'numberedList', '|',
                            'blockQuote', 'link', 'undo', 'redo'
                        ]
                    });

                    // Handle data updates
                    editor.model.document.on('change:data', function() {
                        $dispatch('form.mission', editor.getData())
                        @this.set('form.mission', editor.getData());
                    });

                    // return the editor
                    return editor;
                },
                /**
                 * Initilizes the editor and creates a listener to recreate it after a rerender
                 * @param $dispatch Alpine's magic property
                 */
                init: async function($dispatch) {
                    console.log('init');
                    // Get an editor instance
                    const editor = await this.create($dispatch);
                    // Set the initial data
                    editor.setData('{!! $form->mission !!}')
                    // Pass Alpine context to Livewire's
                    const $this = this;
                    // On reinit, destroy the old instance and create a new one
                    // Livewire.on('reinit', async function(e) {
                    //     editor.setData('');
                    //     editor.destroy()
                    //         .catch( error => {
                    //             console.log( error );
                    //         } );
                    //     await $this.create($dispatch);
                    // });
                }
            }
        }
    </script>
@endpush

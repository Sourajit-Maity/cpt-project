<x-admin.form-section submit="Update">
    <x-slot name="form">
        <x-admin.form-group>
            <x-admin.lable value="Title" required />
            <x-admin.input type="text" wire:model.defer="title" placeholder="Title"  class="{{ $errors->has('title') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="title" />
        </x-admin.form-group>

        <x-admin.form-group class="col-lg-12" wire:ignore>
        <x-admin.lable value="Text Content" />
        <textarea
        x-data x-init="editor = CKEDITOR.replace('text_content');
        editor.on('change', function(event){
            @this.set('text_content', event.editor.getData());
        })" wire:model.defer="text_content" id="text_content" class="form-control {{ $errors->has('text_content') ? 'is-invalid' :'' }}"></textarea>
        </x-admin.form-group>
        </div>
        <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('cms.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>

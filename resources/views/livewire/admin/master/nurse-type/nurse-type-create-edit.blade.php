<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">

        <x-admin.form-group>
            <x-admin.lable value="Project Name" required />
            <x-admin.input type="text" wire:model.defer="project_name" placeholder="Project Name"  class="{{ $errors->has('project_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="project_name" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Project Url" required />
            <x-admin.input type="text" wire:model.defer="project_url" placeholder="Project Url"  class="{{ $errors->has('project_url') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="project_url" />
        </x-admin.form-group>


        <x-admin.form-group>
            <x-admin.lable value="Status" />
            <x-admin.dropdown  wire:model.defer="active" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('active') ? 'is-invalid' :'' }}">
                    @foreach ($statusList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="active" />
        </x-admin.form-group>


        </div>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('projects.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>

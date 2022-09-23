<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">

        <x-admin.form-group>
            <x-admin.lable value="Shift Name" required />
            <x-admin.input type="text" wire:model.defer="shift_name" placeholder="Shift Name"  class="{{ $errors->has('shift_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="shift_name" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Shift Time" required />
            <x-admin.input type="text" wire:model.defer="shift_time" placeholder="Shift Time"  class="{{ $errors->has('shift_time') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="shift_time" />
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
        <x-admin.link :href="route('shift-time.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>

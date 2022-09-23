<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
        <x-admin.form-group>
            <x-admin.lable value="From Year" required />
            <x-admin.input type="text" wire:model.defer="from_year" placeholder="From Year"  class="{{ $errors->has('from_year') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="from_year" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="To Year" required />
            <x-admin.input type="text" wire:model.defer="to_year" placeholder="To Year"  class="{{ $errors->has('to_year') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="to_year" />
        </x-admin.form-group>


        <x-admin.form-group>
            <x-admin.lable value="Status" />
            <x-admin.dropdown  wire:model.defer="status" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('status') ? 'is-invalid' :'' }}">
                    @foreach ($statusList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="status" />
        </x-admin.form-group>


        </div>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('experiences.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>

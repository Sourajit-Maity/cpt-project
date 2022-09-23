<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
        <x-admin.form-group>
            <x-admin.lable value="Country Name" required />
            <x-admin.input type="text" wire:model.defer="country_name" placeholder="Country Name"  class="{{ $errors->has('country_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="country_name" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Country dial Code" required />
            <x-admin.input type="text" wire:model.defer="country_code" placeholder="Country dial Code"  class="{{ $errors->has('country_code') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="country_code" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Country short Code" required />
            <x-admin.input type="text" wire:model.defer="short_code" placeholder="Country short Code"  class="{{ $errors->has('short_code') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="short_code" />
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
        <x-admin.link :href="route('countries.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>

<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">

        <x-admin.form-group>
            <x-admin.lable value="Country" />
            <x-admin.dropdown  wire:model.defer="country_id" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('country_id') ? 'is-invalid' :'' }}">
            <option value="-1">Select Country</option>
            @if(isset($countryList))
                @foreach($countryList as $country)
                <option value="{{$country->id}}">{{$country->country_name}}</option>
                @endforeach
            @endif
            </x-admin.dropdown>
            <x-admin.input-error for="country_id" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="State Name" required />
            <x-admin.input type="text" wire:model.defer="state_name" placeholder="State Name"  class="{{ $errors->has('state_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="state_name" />
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

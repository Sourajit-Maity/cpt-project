<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">

    <x-admin.form-group>
            <x-admin.lable value="Hospital-Institute" required/>
            <x-admin.dropdown  wire:model.defer="user_id" placeHolderText="Please select Hospital Institute" autocomplete="off" class="{{ $errors->has('user_id') ? 'is-invalid' :'' }}">
            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                    @if(isset($hospitalList))
                        @foreach($hospitalList as $hospital)
                        <x-admin.dropdown-item  :value="$hospital->id" :text="$hospital->first_name"/>
                        @endforeach
                    @endif
            </x-admin.dropdown>
            <x-admin.input-error for="user_id" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Job" required/>
            <x-admin.dropdown  wire:model.defer="job_id" placeHolderText="Please select nurse" autocomplete="off" class="{{ $errors->has('job_id') ? 'is-invalid' :'' }}">
            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                    @if(isset($jobList))
                        @foreach($jobList as $job)
                        <x-admin.dropdown-item  :value="$job->id" :text="$job->id"/>
                        @endforeach
                    @endif
            </x-admin.dropdown>
            <x-admin.input-error for="job_id" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Total Amount"  required />
            <x-admin.input type="text" wire:model.defer="total_amount" placeholder="Total Amount"  class="{{ $errors->has('total_amount') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="total_amount" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Card Id"  required />
            <x-admin.input type="text" wire:model.defer="card_id" placeholder="Card Id"  class="{{ $errors->has('card_id') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="card_id" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Card Number" required />
            <x-admin.input type="text" wire:model.defer="card_number" placeholder="Card Number" autocomplete="off" class="{{ $errors->has('card_number') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="card_number" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Transaction No" required />
            <x-admin.input type="text" wire:model.defer="transaction_no" placeholder="Transaction No" autocomplete="off" class="{{ $errors->has('transaction_no') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="transaction_no" />
        </x-admin.form-group>


        <x-admin.form-group>
            <x-admin.lable value="Transaction For" required/>
            <x-admin.dropdown  wire:model.defer="transaction_for" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('transaction_for') ? 'is-invalid' :'' }}">
                    @foreach ($transactionList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="transaction_for" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Payment Status" required/>
            <x-admin.dropdown  wire:model.defer="status" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('status') ? 'is-invalid' :'' }}">
                    @foreach ($statusList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="status" />
        </x-admin.form-group>
       
        </div>
        <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('payments.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>

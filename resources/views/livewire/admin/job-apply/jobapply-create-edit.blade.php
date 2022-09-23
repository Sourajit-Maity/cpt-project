<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">

        <x-admin.form-group>
            <x-admin.lable value="Job Id" required/>
            <x-admin.dropdown  wire:model.defer="job_id" placeHolderText="Please select Job" autocomplete="off" class="{{ $errors->has('job_id') ? 'is-invalid' :'' }}">
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
            <x-admin.lable value="Nurse" required/>
            <x-admin.dropdown  wire:model.defer="user_id" placeHolderText="Please select nurse" autocomplete="off" class="{{ $errors->has('user_id') ? 'is-invalid' :'' }}">
            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                    @if(isset($nurseList))
                        @foreach($nurseList as $nurse)
                        <x-admin.dropdown-item  :value="$nurse->id" :text="$nurse->first_name"/>
                        @endforeach
                    @endif
            </x-admin.dropdown>
            <x-admin.input-error for="user_id" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Status" required/>
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
        <x-admin.link :href="route('job-apply-details.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>

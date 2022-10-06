<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">

    <x-admin.form-group>
            <x-admin.lable value="Project Name" required/>
            <x-admin.dropdown  wire:model.defer="project_id" placeHolderText="Please select job Institute" autocomplete="off" class="{{ $errors->has('project_id') ? 'is-invalid' :'' }}">
            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                    @if(isset($projectList))
                        @foreach($projectList as $project)
                        <x-admin.dropdown-item  :value="$project->id" :text="$project->project_name"/>
                        @endforeach
                    @endif
            </x-admin.dropdown>
            <x-admin.input-error for="project_id" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Employee"/>
            <x-admin.dropdown  wire:model.defer="user_id" placeHolderText="Please select user" autocomplete="off" class="{{ $errors->has('user_id') ? 'is-invalid' :'' }}">
            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                    @if(isset($userList))
                        @foreach($userList as $user)
                        <x-admin.dropdown-item  :value="$user->id" :text="$user->first_name"/>
                        @endforeach
                    @endif
            </x-admin.dropdown>
            <x-admin.input-error for="user_id" />
        </x-admin.form-group>


        <x-admin.form-group>
            <x-admin.lable value="Job Name" required />
            <x-admin.input type="text" wire:model.defer="job_name" placeholder="job Name"  class="{{ $errors->has('job_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="job_name" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Additional Instructions"   />
            <x-admin.input type="text" wire:model.defer="additional_instructions" placeholder="Additional Instructions"  class="{{ $errors->has('additional_instructions') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="additional_instructions" />
        </x-admin.form-group>
     
        <x-admin.form-group>
            <x-admin.lable value="Hour" />
            <x-admin.input type="text" wire:model.defer="hour" placeholder="Hour" autocomplete="off" class="{{ $errors->has('hour') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="hour" />
        </x-admin.form-group>

        
        <!-- <x-admin.form-group>
            <x-admin.lable value="Hiring Budget" required />
            <x-admin.input type="text" wire:model.defer="hiring_budget" placeholder="Hiring Budget" autocomplete="off" class="{{ $errors->has('hiring_budget') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="hiring_budget" />
        </x-admin.form-group> -->


       

        <x-admin.form-group>
            <x-admin.lable value="Urgent Requirement" required/>
            <x-admin.dropdown  wire:model.defer="urgent_requirement" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('urgent_requirement') ? 'is-invalid' :'' }}">
                    @foreach ($urgentList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="urgent_requirement" />
        </x-admin.form-group>

        <!-- <x-admin.form-group>
            <x-admin.lable value="Promo Code" required />
            <x-admin.input type="text" wire:model.defer="promo_code" placeholder="promo code" autocomplete="off" class="{{ $errors->has('promo_code') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="promo_code" />
        </x-admin.form-group> -->

        <!-- <x-admin.form-group>
            <x-admin.lable value="Total Amount" required />
            <x-admin.input type="text" wire:model.defer="total_amount" placeholder="Total Amount" autocomplete="off" class="{{ $errors->has('total_amount') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="total_amount" />
        </x-admin.form-group> -->

        <!-- <x-admin.form-group>
            <x-admin.lable value="Discount Amount"  required />
            <x-admin.input type="text" wire:model.defer="discount_amount" placeholder="Discount Amount" autocomplete="off" class="{{ $errors->has('discount_amount') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="discount_amount" />
        </x-admin.form-group> -->


        <x-admin.form-group>
            <x-admin.lable value="Job Status" required/>
            <x-admin.dropdown  wire:model.defer="job_status" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('job_status') ? 'is-invalid' :'' }}">
                    @foreach ($jobList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="job_status" />
        </x-admin.form-group>

        <!-- <x-admin.form-group>
            <x-admin.lable value="Payment Status" required/>
            <x-admin.dropdown  wire:model.defer="payment_status" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('payment_status') ? 'is-invalid' :'' }}">
                    @foreach ($paymentList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="payment_status" />
        </x-admin.form-group> -->


        <x-admin.form-group>
            <x-admin.lable value="Status" required/>
            <x-admin.dropdown  wire:model.defer="active" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('active') ? 'is-invalid' :'' }}">
                    @foreach ($statusList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="active" />
        </x-admin.form-group>

        
        </div>
        <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('jobs.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>

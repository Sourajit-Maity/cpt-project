<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">

    <x-admin.form-group>
            <x-admin.lable value="Hospital-Institute" required/>
            <x-admin.dropdown  wire:model.defer="hospital_id" placeHolderText="Please select Hospital Institute" autocomplete="off" class="{{ $errors->has('hospital_id') ? 'is-invalid' :'' }}">
            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                    @if(isset($hospitalList))
                        @foreach($hospitalList as $hospital)
                        <x-admin.dropdown-item  :value="$hospital->id" :text="$hospital->first_name"/>
                        @endforeach
                    @endif
            </x-admin.dropdown>
            <x-admin.input-error for="hospital_id" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Nurse"/>
            <x-admin.dropdown  wire:model.defer="nurse_id" placeHolderText="Please select nurse" autocomplete="off" class="{{ $errors->has('nurse_id') ? 'is-invalid' :'' }}">
            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                    @if(isset($nurseList))
                        @foreach($nurseList as $nurse)
                        <x-admin.dropdown-item  :value="$nurse->id" :text="$nurse->first_name"/>
                        @endforeach
                    @endif
            </x-admin.dropdown>
            <x-admin.input-error for="nurse_id" />
        </x-admin.form-group>


        <x-admin.form-group>
            <x-admin.lable value="Hospital Name" required />
            <x-admin.input type="text" wire:model.defer="hospital_name" placeholder="Hospital Name"  class="{{ $errors->has('hospital_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="hospital_name" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Additional Instructions"   />
            <x-admin.input type="text" wire:model.defer="additional_instructions" placeholder="Additional Instructions"  class="{{ $errors->has('additional_instructions') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="additional_instructions" />
        </x-admin.form-group>
        <!-- <x-admin.form-group>
            <x-admin.lable value="Employee Required" required />
            <x-admin.input type="text" wire:model.defer="employee_required" placeholder="Employee Required" autocomplete="off" class="{{ $errors->has('employee_required') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="employee_required" />
        </x-admin.form-group> -->
        <x-admin.form-group>
            <x-admin.lable value="Shift Timing" required />
            <x-admin.input type="text" wire:model.defer="shifting_timings" placeholder="Shift Timing" autocomplete="off" class="{{ $errors->has('shifting_timings') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="shifting_timings" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Phone" required />
            <x-admin.input type="text" wire:model.defer="hospital_phone" placeholder="Hospital Phone" autocomplete="off" class="{{ $errors->has('hospital_phone') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="hospital_phone" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Skill" required />
            <x-admin.input type="text" wire:model.defer="skills" placeholder="Skill" autocomplete="off" class="{{ $errors->has('skills') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="skills" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Hiring Budget" required />
            <x-admin.input type="text" wire:model.defer="hiring_budget" placeholder="Hiring Budget" autocomplete="off" class="{{ $errors->has('hiring_budget') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="hiring_budget" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Licence Type" required/>
            <x-admin.dropdown  wire:model.defer="licence_type" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('licence_type') ? 'is-invalid' :'' }}">
                    @foreach ($licenceList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="licence_type" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Experience" required />
            <x-admin.input type="text" wire:model.defer="experience" placeholder="Experience" autocomplete="off" class="{{ $errors->has('experience') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="experience" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Hospital Location" required />
            <x-admin.input type="text" wire:model.defer="hospital_location" placeholder="Hospital Location" autocomplete="off" class="{{ $errors->has('hospital_location') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="hospital_location" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Hospital Zipcode" required />
            <x-admin.input type="text" wire:model.defer="hospital_zipcode" placeholder="Hospital Zipcode" autocomplete="off" class="{{ $errors->has('hospital_zipcode') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="hospital_zipcode" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Country" required/>
            <x-admin.dropdown  wire:model.defer="hospital_country_id" placeHolderText="Please select country" autocomplete="off" class="{{ $errors->has('hospital_country_id') ? 'is-invalid' :'' }}">
            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                    @if(isset($countryList))
                        @foreach($countryList as $country)
                        <x-admin.dropdown-item  :value="$country->id" :text="$country->country_name"/>
                        @endforeach
                    @endif
            </x-admin.dropdown>
            <x-admin.input-error for="hospital_country_id" />
        </x-admin.form-group>
      
        <x-admin.form-group>
            <x-admin.lable value="State" required/>
            <x-admin.dropdown  wire:model.defer="hospital_state_id" placeHolderText="Please select state" autocomplete="off" class="{{ $errors->has('hospital_state_id') ? 'is-invalid' :'' }}">
            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                    @if(isset($stateList))
                        @foreach($stateList as $state)
                        <x-admin.dropdown-item  :value="$state->id" :text="$state->state_name"/>
                        @endforeach
                    @endif
            </x-admin.dropdown>
            <x-admin.input-error for="hospital_state_id" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="City" required/>
            <x-admin.dropdown  wire:model.defer="hospital_city_id" placeHolderText="Please select city" autocomplete="off" class="{{ $errors->has('hospital_city_id') ? 'is-invalid' :'' }}">
                <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                    @if(isset($stateList))
                        @foreach($cityList as $city)
                        <x-admin.dropdown-item  :value="$city->id" :text="$city->city_name"/>
                        @endforeach
                    @endif
            </x-admin.dropdown>
            <x-admin.input-error for="hospital_city_id" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Urgent Requirement" required/>
            <x-admin.dropdown  wire:model.defer="urgent_requirement" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('urgent_requirement') ? 'is-invalid' :'' }}">
                    @foreach ($urgentList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="urgent_requirement" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Promo Code" required />
            <x-admin.input type="text" wire:model.defer="promo_code" placeholder="promo code" autocomplete="off" class="{{ $errors->has('promo_code') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="promo_code" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Total Amount" required />
            <x-admin.input type="text" wire:model.defer="total_amount" placeholder="Total Amount" autocomplete="off" class="{{ $errors->has('total_amount') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="total_amount" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Discount Amount"  required />
            <x-admin.input type="text" wire:model.defer="discount_amount" placeholder="Discount Amount" autocomplete="off" class="{{ $errors->has('discount_amount') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="discount_amount" />
        </x-admin.form-group>


        <x-admin.form-group>
            <x-admin.lable value="Job Status" required/>
            <x-admin.dropdown  wire:model.defer="job_status" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('job_status') ? 'is-invalid' :'' }}">
                    @foreach ($jobList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="job_status" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Payment Status" required/>
            <x-admin.dropdown  wire:model.defer="payment_status" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('payment_status') ? 'is-invalid' :'' }}">
                    @foreach ($paymentList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="payment_status" />
        </x-admin.form-group>


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

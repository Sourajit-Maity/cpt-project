<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
        <x-admin.form-group>
            <x-admin.lable value="First Name" required />
            <x-admin.input type="text" wire:model.defer="first_name" placeholder="First Name"  class="{{ $errors->has('first_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="first_name" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Last Name"  required />
            <x-admin.input type="text" wire:model.defer="last_name" placeholder="Last Name"  class="{{ $errors->has('last_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="last_name" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="User Name"  required />
            <x-admin.input type="text" wire:model.defer="username" placeholder="User Name"  class="{{ $errors->has('username') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="username" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Email" required />
            <x-admin.input type="text" wire:model.defer="email" placeholder="Email" autocomplete="off" class="{{ $errors->has('email') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="email" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Phone" required />
            <x-admin.input type="text" wire:model.defer="phone" placeholder="Phone" autocomplete="off" class="{{ $errors->has('phone') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="phone" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Experience Year" required />
            <x-admin.input type="text" wire:model.defer="experience_year" placeholder="Experience year" autocomplete="off" class="{{ $errors->has('experience_year') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="experience_year" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Experience Month" required />
            <x-admin.input type="text" wire:model.defer="experience_month" placeholder="Experience Month" autocomplete="off" class="{{ $errors->has('experience_month') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="experience_month" />
        </x-admin.form-group>

        <!-- <x-admin.form-group>
            <x-admin.lable value="Experience" required />
            <x-admin.input type="text" wire:model.defer="experience" placeholder="Experience" autocomplete="off" class="{{ $errors->has('experience') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="experience" />
        </x-admin.form-group> -->

        <x-admin.form-group>
            <x-admin.lable value="Salary" required />
            <x-admin.input type="text" wire:model.defer="salary" placeholder="Salary" autocomplete="off" class="{{ $errors->has('salary') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="salary" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Date of Birth" required />
            <x-admin.input type="date" wire:model.defer="date_of_birth" placeholder="Date of Birth" autocomplete="off" class="{{ $errors->has('date_of_birth') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="date_of_birth" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Licence Number" required />
            <x-admin.input type="text" wire:model.defer="licence_number" placeholder="Licence Number" autocomplete="off" class="{{ $errors->has('licence_number') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="licence_number" />
        </x-admin.form-group>
     
        @if(!$isEdit)
        <x-admin.form-group>
            <x-admin.lable value="Password"  required />
            <x-admin.input type="password" wire:model.defer="password" placeholder="Password" autocomplete="off" class="{{ $errors->has('password') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="password" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Confirm Password"  required />
            <x-admin.input type="password" wire:model.defer="password_confirmation" placeholder="Reenter Password" autocomplete="off" class="{{ $errors->has('password_confirmation') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="password_confirmation" />
        </x-admin.form-group>
        @endif
        <x-admin.form-group>
            <x-admin.lable value="Country" required/>
            <x-admin.dropdown  wire:model.defer="country_id" placeHolderText="Please select country" autocomplete="off" class="{{ $errors->has('country_id') ? 'is-invalid' :'' }}">
            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                    @if(isset($countryList))
                        @foreach($countryList as $country)
                        <x-admin.dropdown-item  :value="$country->id" :text="$country->country_name"/>
                        @endforeach
                    @endif
            </x-admin.dropdown>
            <x-admin.input-error for="country_id" />
        </x-admin.form-group>
      
        <x-admin.form-group>
            <x-admin.lable value="State" required/>
            <x-admin.dropdown  wire:model.defer="state_id" placeHolderText="Please select state" autocomplete="off" class="{{ $errors->has('state_id') ? 'is-invalid' :'' }}">
            <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                    @if(isset($stateList))
                        @foreach($stateList as $state)
                        <x-admin.dropdown-item  :value="$state->id" :text="$state->state_name"/>
                        @endforeach
                    @endif
            </x-admin.dropdown>
            <x-admin.input-error for="state_id" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="City" required/>
            <x-admin.dropdown  wire:model.defer="city_id" placeHolderText="Please select city" autocomplete="off" class="{{ $errors->has('city_id') ? 'is-invalid' :'' }}">
                <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                    @if(isset($stateList))
                        @foreach($cityList as $city)
                        <x-admin.dropdown-item  :value="$city->id" :text="$city->city_name"/>
                        @endforeach
                    @endif
            </x-admin.dropdown>
            <x-admin.input-error for="city_id" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="ZipCode" required />
            <x-admin.input type="text" wire:model.defer="zipcode" placeholder="Zipcode" autocomplete="off" class="{{ $errors->has('zipcode') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="zipcode" />
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
            <x-admin.lable value="Status" required/>
            <x-admin.dropdown  wire:model.defer="active" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('active') ? 'is-invalid' :'' }}">
                    @foreach ($statusList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="active" />
        </x-admin.form-group>

        <x-admin.form-group class="col-lg-6" >
        <x-admin.lable value="Profile Image" required/>
        @if($model_image)
        <img src="{{ $model_image->getUrl() }}" style="width: 100px; height:100px;" /><br/>
        @endif
        <img src="{{ Storage::url($nurse->profile_photo_path) }}" alt="">
        <x-admin.filepond wire:model="photo" class="{{ $errors->has('photo') ? 'is-invalid' :'' }}"
        allowImagePreview
        imagePreviewMaxHeight="50"
        allowFileTypeValidation
        acceptedFileTypes="['image/png', 'image/jpg', 'image/jpeg']"
        allowFileSizeValidation
        maxFileSize="4mb"/>
        <x-admin.input-error for="photo" />
        </x-admin.form-group>

        <x-admin.form-group class="col-lg-12">
        <x-admin.lable value="Resume" /><br/>
        @foreach($model_documents as $documents)
        <a href="{{ $documents->getUrl() }}">{{ $documents->name }}</a>
        <button type="button" wire:click="deletedocuments({{ $documents->id }})">&nbsp; | &nbsp;&nbsp;<i
        class="fa fa-trash"></i>Delete</button><br/>
        @endforeach
        <x-admin.filepond wire:model="photos" multiple
        allowImagePreview
        imagePreviewMaxHeight="50"
        allowFileTypeValidation
        acceptedFileTypes="['image/png', 'image/jpg', 'image/jpeg', 'application/pdf']"
        allowFileSizeValidation
        maxFileSize="4mb"/>
        </x-admin.form-group>

        <x-admin.form-group class="col-lg-12" >
        <x-admin.lable value="Address" required/>
        <textarea
        wire:model.defer="address" id="address" class="form-control {{ $errors->has('address') ? 'is-invalid' :'' }}"></textarea>
        <x-admin.input-error for="address" />
        </x-admin.form-group>
        </div>
        <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('nurse.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>

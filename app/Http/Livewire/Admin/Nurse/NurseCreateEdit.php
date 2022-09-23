<?php

namespace App\Http\Livewire\Admin\Nurse;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Models\Role;

class NurseCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $first_name, $last_name, $username,$zipcode, $city_id,$profile_photo_path, $email,$blankArr, $password, $phone, $active, $password_confirmation, $nurse, $model_id, $cityList, $stateList, $countryList, $roleList, $country_id, $state_id, $role;
    public $experience_year, $experience_month,$experience, $salary,$date_of_birth, $licence_number, $licence_type;
    public $address;
    public $isEdit = false;
    public $licenceList = [];
    public $statusList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($nurse = null)
    {
        if ($nurse) {
            $this->nurse = $nurse;
            $this->fill($this->nurse);
            $this->isEdit = true;
        } else
            $this->nurse = new User;

        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
        $this->licenceList = [
            ['value' => 1, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "CNA"],
            ['value' => 2, 'text' => "LPN"]
        ];
        $this->blankArr = [
            "value"=> "", "text"=> "== Select One =="
        ];
        $this->stateList = State::get();
        $this->countryList = Country::get();
        $this->cityList = City::get();
        $this->roleList = Role::where('name','!=','SUPER-ADMIN')->get();
        //dd($this->roleList);

        $this->model_image = Media::where(['model_id' => $this->nurse->id, 'collection_name' => 'images'])->first();
        if (!$this->model_image == null) {
            $this->imgId = $this->model_image->id;
        }
        $this->model_documents = Media::where(['model_id' => $this->nurse->id, 'collection_name' => 'documents'])->get();
    }

    public function validationRuleForSave(): array
    {
        return
            [
                'first_name' => ['required', 'max:255', 'max:255','regex:/^[a-zA-Z]+$/u'],
                'last_name' => ['required', 'max:255', 'max:255','regex:/^[a-zA-Z]+$/u'],
                'username' => ['required', 'max:255', 'max:255','regex:/^[a-zA-Z]+$/u'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users'),'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
                'phone' => ['required', Rule::unique('users'), 'regex:/^([0-9\s+\(\)]*)$/', 'min:8', 'max:13'],
                'password' => ['required', 'max:255', 'min:6', 'confirmed'],
                'password_confirmation' => ['required', 'max:255', 'min:6'],
                'active' => ['required'],
                'photo' => ['required'],
                'address' => ['required'],
                'country_id' => ['required','exists:countries,id'],
                'state_id' => ['required'],
                'city_id' => ['required'],
                'experience_year' => ['required'],
                'experience_month' => ['required'],
                //'experience' => ['required'],
                'salary' => ['required'],
                'date_of_birth' => ['required'],
                'licence_number' => ['required'],
                'licence_type' => ['required'],
                'zipcode' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:5', 'max:8'],
                //'role' => ['required','exists:roles,name'],

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'first_name' => ['required', 'max:255', 'max:255','regex:/^[a-zA-Z]+$/u'],
                'last_name' => ['required', 'max:255', 'max:255','regex:/^[a-zA-Z]+$/u'],
                'username' => ['required', 'max:255', 'max:255','regex:/^[a-zA-Z]+$/u'],
                'active' => ['required'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->nurse->id),'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
                'phone' => ['required', Rule::unique('users')->ignore($this->nurse->id), 'regex:/^([0-9\s+\(\)]*)$/', 'min:8', 'max:13'],
                'address' => ['required'],
                'country_id' => ['required','exists:countries,id'],
                'state_id' => ['required'],
                'city_id' => ['required'],
                'experience_year' => ['required'],
                'experience_month' => ['required'],
                //'experience' => ['required'],
                'salary' => ['required'],
                'date_of_birth' => ['required'],
                'licence_number' => ['required'],
                'licence_type' => ['required'],
                'zipcode' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:5', 'max:8'],
                //'role' => ['nullable','exists:roles,name'],
            ];
    }

    protected $messages = [
        'active.required'=>'Please Choose one option.',
        'licence_type.required'=>'Please Choose one option.',
        'photo.required'=>'Profile photo is required',
        'country_id.required'=>'Country name is required.',
        'state_id.required'=>'State name is required.',
        'city_id.required'=>'City name is required.',
        'first_name.required'=>'First name is required.',
        'first_name.regex'=>'First name should be alphabate.',
        'last_name.required'=>'Last name is required.',
        'last_name.regex'=>'Last name should be alphabate.',
        'username.required'=>'User name is required.',
        'username.regex'=>'User name should be alphabate.',
        'email.required'=>'Email id is required.',
        'email.email' => 'Give Correct format',
        'email.regex'=>'Mail format is not correct.',
        'phone.required'=>'Phone number is required.',
        'phone.regex'=>'Phone number should be integer.',
        'password.required' =>'Password field is required.',
        'password.confirmed' =>'Password is not confirmed.',
        'password_confirmation.required' =>'Password confirmation field is required.',
        'experience_year.required'=>'Experience year is required.',
        'experience_month.required'=>'Experience month is required.',
        'salary.required'=>'Salary is required.',
        'date_of_birth.required'=>'Date of birth is required.',
        'licence_number.required'=>'License number is required.',
        'licence_type.required'=>'License type is required.',
        'zipcode.required'=>'Zipcode number is required.',
        'zipcode.regex'=>'Zipcode number should be integer.',
        'address.required'=>'Address is required.',
        
];    
    public function saveOrUpdate()
    {

        // $this->nurse->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        // if ($this->photo) {
        //     if ($this->imgId) {
        //         $item = Media::find($this->imgId);
        //         $item->delete(); // delete previous image in the database

        //         $this->nurse->addMedia($this->photo->getRealPath())
        //             ->usingName($this->photo->getClientOriginalName())
        //             ->toMediaCollection('images');
        //     } else {
        //         $this->nurse->addMedia($this->photo->getRealPath())
        //             ->usingName($this->photo->getClientOriginalName())
        //             ->toMediaCollection('images');
        //     }
        // }
        $validatedData = $this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave());

        $validatedData['profile_photo_path']  =  $this->photo->store('photos', 'public');
        $validatedData['resume_path']  =  $this->photo->store('photos', 'public');

        if(!$this->isEdit)
        //dd($validatedData);
        $this->nurse = User::create($validatedData);
        $this->nurse->assignRole('NURSE');
        if($this->isEdit)
        $this->nurse->update($validatedData);

        $msgAction = 'NURSE has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('nurse.index');
    }

    // public function deletedocuments($id)
    // {
    //     $item = Media::find($id);
    //     $item->delete(); // delete previous image in the database
    //     $this->showModal('success', 'Success', 'Document deleted successfully');
    //     $this->emit('refreshProducts');
    // }

    public function render()
    {
        return view('livewire.admin.nurse.nurse-create-edit');
    }
}

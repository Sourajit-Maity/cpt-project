<?php

namespace App\Http\Livewire\Admin\Jobs;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use App\Models\Jobs;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class JobCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $nurse_id, $job, $shifting_timings, $hospital_id, $additional_instructions, $hospital_name, $blankArr, $employee_required, $skills, $active, $hiring_budget, $hospital_phone, $urgent_requirement, $cityList, $stateList, $countryList, $hospital_location, $hospital_country_id, $hospital_state_id, $hospital_city_id;
    public $hospital_zipcode, $job_post_date, $promo_code, $discount_amount, $reward_discount_amount, $total_amount, $job_status, $payment_status;
    public $experience_year, $experience_month, $experience, $salary, $date_of_birth, $nurseList, $hospitalList, $licence_number, $licence_type;
    public $address;
    public $isEdit = false;
    public $jobList = [];
    public $licenceList = [];
    public $paymentList = [];
    public $statusList = [];
    public $urgentList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($job = null)
    {
        if ($job) {
            $this->job = $job;
            $this->fill($this->job);
            $this->isEdit = true;
        } else
            $this->job = new Jobs;

        $this->urgentList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Yes"],
            ['value' => 2, 'text' => "No"]
        ];
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

        $this->jobList = [
            ['value' => 1, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Ongoing"],
            ['value' => 2, 'text' => "Upcoming"],
            ['value' => 3, 'text' => "Closed"]
        ];

        $this->paymentList = [
            ['value' => 1, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "In progres"],
            ['value' => 2, 'text' => "Completed"],
            ['value' => 3, 'text' => "Failed"]
        ];
        $this->blankArr = [
            "value" => "", "text" => "== Select One =="
        ];
        $this->stateList = State::get();
        $this->countryList = Country::get();
        $this->cityList = City::get();
        $this->roleList = Role::where('name', '!=', 'SUPER-ADMIN')->get();
        $this->nurseList = User::role('NURSE')->get();
        $this->hospitalList = User::role('HOSPITAL')->get();
        // dd($this->hospitalList);    

    }

    public function validationRuleForSave(): array
    {
        return
            [
                'active' => ['required'],
                'nurse_id' => ['nullable'],
                'hospital_id' => ['required'],
                'hospital_country_id' => ['required', 'exists:countries,id'],
                'hospital_state_id' => ['required'],
                'hospital_city_id' => ['required'],
                'additional_instructions' => ['nullable'],
                'hospital_name' => ['required'],
                'experience' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:13'],
                //'employee_required' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:10'],
                'skills' => ['required'],
                'hiring_budget' => ['required'],
                'licence_type' => ['required'],
                'hospital_phone' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:8', 'max:13'],
                'urgent_requirement' => ['required'],
                'hospital_location' => ['required'],
                'hospital_zipcode' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:5', 'max:10'],
                'promo_code' => ['required'],
                'discount_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'total_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'job_status' => ['required'],
                'payment_status' => ['required'],
                'shifting_timings' => ['required'],

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'active' => ['required'],
                'nurse_id' => ['nullable'],
                'hospital_id' => ['required'],
                'hospital_country_id' => ['required', 'exists:countries,id'],
                'hospital_state_id' => ['required'],
                'hospital_city_id' => ['required'],
                'additional_instructions' => ['nullable'],
                'hospital_name' => ['required'],
                'experience' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:13'],
                //'employee_required' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:10'],
                'skills' => ['required'],
                'hiring_budget' => ['required'],
                'licence_type' => ['required'],
                'hospital_phone' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:8', 'max:13'],
                'urgent_requirement' => ['required'],
                'hospital_location' => ['required'],
                'hospital_zipcode' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:5', 'max:10'],
                'promo_code' => ['required'],
                'discount_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'total_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'job_status' => ['required'],
                'payment_status' => ['required'],
                'shifting_timings' => ['required'],
            ];
    }



    public function saveOrUpdate()
    {
        $this->isEdit ? $this->job->job_post_date = Carbon::now() : $this->job->job_post_date = Carbon::now();
        $this->job->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        if (!$this->isEdit){
            $msgAction = 'Job has been added successfully';
            $this->showToastr("success", $msgAction);
        }
            

        return redirect()->route('jobs.index');
    }




    public function render()
    {
        return view('livewire.admin.jobs.job-create-edit');
    }
}

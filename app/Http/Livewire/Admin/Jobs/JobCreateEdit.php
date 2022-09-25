<?php

namespace App\Http\Livewire\Admin\Jobs;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\State;
use App\Models\Project;
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
    public $project_id, $job, $shifting_timings, $user_id, $additional_instructions, $job_name, $blankArr, $employee_required, $skills, $active, $hiring_budget, $job_phone, $urgent_requirement, $cityList, $stateList, $countryList, $job_location, $job_country_id, $job_state_id, $job_city_id;
    public $job_zipcode, $job_post_date, $promo_code, $discount_amount, $reward_discount_amount, $total_amount, $job_status, $payment_status;
    public $experience_year, $experience_month, $experience, $salary, $date_of_birth, $nurseList, $jobList, $licence_number, $licence_type;
    public $address;
    public $isEdit = false;
    public $projectList = [];
    public $userList = [];
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
        $this->projectList = Project::get();
        $this->userList = User::role('CLIENT')->get();
        // dd($this->projectList);    

    }

    public function validationRuleForSave(): array
    {
        return
            [
                'active' => ['required'],
                'user_id' => ['nullable'],
                'project_id' => ['required'],     
                'additional_instructions' => ['nullable'],
                'job_name' => ['required'],
                'hiring_budget' => ['required'],
                
                'urgent_requirement' => ['required'],
                'promo_code' => ['required'],
                'discount_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'total_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'job_status' => ['required'],
                'payment_status' => ['required'],

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'active' => ['required'],
                'user_id' => ['nullable'],
                'project_id' => ['required'],
                'additional_instructions' => ['nullable'],
                'job_name' => ['required'],
                'skills' => ['required'],
                'hiring_budget' => ['required'],
                
                'urgent_requirement' => ['required'],
                'promo_code' => ['required'],
                'discount_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'total_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'job_status' => ['required'],
                'payment_status' => ['required'],
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

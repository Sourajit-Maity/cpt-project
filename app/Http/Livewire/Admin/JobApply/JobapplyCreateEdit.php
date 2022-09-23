<?php

namespace App\Http\Livewire\Admin\JobApply;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\JobApplication;
use App\Models\Jobs;
use Illuminate\Validation\Rule;

class JobapplyCreateEdit extends Component
{
    use AlertMessage;
    public $user_id, $jobapply, $job_id, $status,$blankArr;
    public $isEdit = false;
    public $jobList = [];
    public $statusList = [];
    public $nurseList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($jobapply = null)
    {
        if ($jobapply) {
            $this->jobapply = $jobapply;
            $this->fill($this->jobapply);
            $this->isEdit = true;
        } else
            $this->jobapply = new JobApplication;


        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];

        $this->blankArr = [
            "value" => "", "text" => "== Select One =="
        ];
        $this->jobList = Jobs::get();
        $this->nurseList = User::role('NURSE')->get();


    }

    public function validationRuleForSave(): array
    {
        return
            [
                'status' => ['required'],
                'user_id' => ['required'],
                'job_id' => ['required'],

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'status' => ['required'],
                'user_id' => ['required'],
                'job_id' => ['required'],
            ];
    }



    public function saveOrUpdate()
    {
        $this->jobapply->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

   

        return redirect()->route('job-apply-details.index');
    }
    public function render()
    {
        return view('livewire.admin.job-apply.jobapply-create-edit');
    }
}

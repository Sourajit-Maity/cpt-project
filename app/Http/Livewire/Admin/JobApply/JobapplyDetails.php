<?php

namespace App\Http\Livewire\Admin\JobApply;

use Livewire\Component;
use App\Models\User;
use App\Models\Jobs;
use App\Models\JobApplication;
class JobapplyDetails extends Component
{
    public $jobapply;

    public function mount($jobapply = null)
    {
       $this->jobapply = $jobapply;
    }
    
    public function render()
    {
        $details = JobApplication::where('id',$this->jobapply)->with('nurse','job')->first();
         dd($details);
        return view('livewire.admin.job-apply.jobapply-details',['details'=>$details]);
    }
   
}

<?php

namespace App\Http\Livewire\Admin\Jobs;

use Livewire\Component;
use App\Models\User;
use App\Models\Jobs;
class JobDetails extends Component
{
    public $job;

    public function mount($job = null)
    {
       $this->job = $job;
    }
    
    public function render()
    {
        $details = Jobs::where('id',$this->job)->with('user','projects')->first();
        // dd($details);
        return view('livewire.admin.jobs.job-details',['details'=>$details]);
    }

   
}

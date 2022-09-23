<?php

namespace App\Http\Livewire\Admin\JobApply;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\Jobs;
use App\Models\JobApplication;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class JobapplyList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];

    protected $paginationTheme = 'bootstrap';

    public  $searchNurse,$searchJob,$searchStatus = -1, $perPage = 5,$search;
    protected $listeners = ['deleteConfirm', 'changeStatus'];

    public function mount()
    {
        $this->perPageList = [
            ['value' => 5, 'text' => "5"],
            ['value' => 10, 'text' => "10"],
            ['value' => 20, 'text' => "20"],
            ['value' => 50, 'text' => "50"],
            ['value' => 100, 'text' => "100"]
        ];
    }
    public function getRandomColor()
    {
        $arrIndex = array_rand($this->badgeColors);
        return $this->badgeColors[$arrIndex];
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }
    public function resetSearch()
    {
        $this->searchNurse = "";
        $this->searchJob = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $queryData = JobApplication::query()->with(['nurse','job']);
        
        if ($this->searchNurse) {
                $queryData->whereHas('nurse', function($query) {
                    $query->where('first_name',  'like', '%'  . $this->searchNurse . '%');
                 })->get();
        }

        if ($this->searchJob) {
            $queryData->whereHas('job', function($query) {
                $query->where('first_name',  'like', '%'  . $this->searchJob . '%');
             })->get();
        }

        if ($this->searchStatus >= 0)
            $queryData->orWhere('status', $this->searchStatus);

        return view('livewire.admin.job-apply.jobapply-list', [
            'details' => $queryData
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        JobApplication::destroy($id);
        $this->showModal('success', 'Success', 'status has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(JobApplication $details)
    {
        $details->status = ($details->status==1)?0:1;
        $details->update();
        $this->showModal('success', 'Success', 'status has been changed successfully');
    }

}

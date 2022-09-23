<?php

namespace App\Http\Livewire\Admin\Jobs;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\Jobs;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class Joblist extends Component
{

    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];

    protected $paginationTheme = 'bootstrap';

    public  $searchNurse,$searchHospital,$searchLocation,$searchAmount,$searchDate,$searchStatus = -1, $perPage = 5,$search;
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
        $this->searchHospital = "";
        $this->searchLocation = "";
        $this->searchDate = "";
        $this->searchAmount = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $queryData = Jobs::query()->where('job_status','!=', 3)->with(['nurse','hospital','country','state','city']);
        
        if ($this->searchNurse) {
                $queryData->whereHas('nurse', function($query) {
                    $query->where('first_name',  'like', '%'  . $this->searchNurse . '%');
                 })->get();
        }

        if ($this->searchHospital) {
            $queryData->whereHas('hospital', function($query) {
                $query->where('first_name',  'like', '%'  . $this->searchHospital . '%');
             })->get();
        }
       
        if ($this->searchLocation)
            $queryData->Where('hospital_location', 'like', '%' . $this->searchLocation . '%');
        if ($this->searchDate)
            $queryData->Where('job_post_date', 'like', '%' . $this->searchDate . '%');
        if ($this->searchAmount)
            $queryData->Where('total_amount', 'like', '%' . $this->searchAmount . '%');

        if ($this->searchStatus >= 0)
            $queryData->orWhere('active', $this->searchStatus);

        return view('livewire.admin.jobs.joblist', [
            'details' => $queryData
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        Jobs::destroy($id);
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

    public function changeStatus(Jobs $details)
    {
        $details->active = ($details->active==1)?0:1;
        $details->update();
        $this->showModal('success', 'Success', 'status has been changed successfully');
    }
}

 

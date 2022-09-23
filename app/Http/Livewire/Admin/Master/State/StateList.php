<?php

namespace App\Http\Livewire\Admin\Master\State;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Models\State;

class StateList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchCountryName, $searchStateName, $searchStatus = -1, $perPage = 5;
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
        $this->searchCountryName = "";
        $this->searchStateName = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $queryData = State::query();
        $queryData = $queryData->join('countries','countries.id','states.country_id');

        if ($this->searchCountryName)
            $queryData->Where('countries.country_name', 'like', '%' . $this->searchCountryName . '%');
        
        if ($this->searchStateName)
            $queryData->orWhere('states.state_name', 'like', '%' . $this->searchStateName . '%');

        if ($this->searchStatus >= 0)
            $queryData->where('states.active', $this->searchStatus);
            
        return view('livewire.admin.master.state.state-list', [
            'states' => $queryData
                ->orderBy($this->sortBy, $this->sortDirection)
                ->select('states.*')
                ->paginate($this->perPage)
        ]);
    }
    
    public function deleteConfirm($id)
    {
        State::destroy($id);
        $this->showModal('success', 'Success', 'State has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this State!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(State $state)
    {
        $state->active = ($state->active==1)?0:1;
        $state->update();
        $this->showModal('success', 'Success', 'State status has been changed successfully');
    }

}

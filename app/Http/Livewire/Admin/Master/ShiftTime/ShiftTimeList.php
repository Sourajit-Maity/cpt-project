<?php

namespace App\Http\Livewire\Admin\Master\ShiftTime;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Models\ShiftTime;

class ShiftTimeList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchType,$searchTime, $searchStatus = -1, $perPage = 5;
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
        $this->searchType = "";
        $this->searchTime = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $queryData = ShiftTime::query();

        if ($this->searchType)
            $queryData->Where('shift_name', 'like', '%' . $this->searchType . '%');
        if ($this->searchTime)
            $queryData->Where('shift_time', 'like', '%' . $this->searchTime . '%');

        if ($this->searchStatus >= 0)
            $queryData->where('active', $this->searchStatus);

        return view('livewire.admin.master.shift-time.shift-time-list', [
            'types' => $queryData
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    
    public function deleteConfirm($id)
    {
        ShiftTime::destroy($id);
        $this->showModal('success', 'Success', 'Shift Time has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this Shift Time!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(ShiftTime $data)
    {
        $data->active = ($data->active==1)?0:1;
        $data->update();
        $this->showModal('success', 'Success', 'Shift Time status has been changed successfully');
    }

}
   
<?php

namespace App\Http\Livewire\Admin\Master\Experience;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Models\Experience;


class ExperienceList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchFromYear, $searchToYear, $searchStatus = -1, $perPage = 5;
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
        $this->searchFromYear = "";
        $this->searchToYear = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $queryData = Experience::query();

        if ($this->searchFromYear)
            $queryData->Where('from_year', 'like', '%' . $this->searchFromYear . '%');

        if ($this->searchToYear)
            $queryData->Where('to_year', 'like', '%' . $this->searchToYear . '%');

        if ($this->searchStatus >= 0)
            $queryData->where('status', $this->searchStatus);

        return view('livewire.admin.master.experience.experience-list', [
            'experiences' => $queryData
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    
    public function deleteConfirm($id)
    {
        Experience::destroy($id);
        $this->showModal('success', 'Success', 'Experience has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this Experience!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(Experience $experience)
    {
        $experience->status = ($experience->status==1)?0:1;
        $experience->update();
        $this->showModal('success', 'Success', 'Experience status has been changed successfully');
    }

}
    

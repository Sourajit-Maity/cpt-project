<?php

namespace App\Http\Livewire\Admin\Master\Skill;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Models\Skills;

class SkillList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchSkill, $searchStatus = -1, $perPage = 5;
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
        $this->searchSkill = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $queryData = Skills::query();

        if ($this->searchSkill)
            $queryData->Where('skill_name', 'like', '%' . $this->searchSkill . '%');

        if ($this->searchStatus >= 0)
            $queryData->where('active', $this->searchStatus);

        return view('livewire.admin.master.skill.skill-list', [
            'skills' => $queryData
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    
    public function deleteConfirm($id)
    {
        Skills::destroy($id);
        $this->showModal('success', 'Success', 'Skill has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this Skill!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(Skills $skills)
    {
        $skills->active = ($skills->active==1)?0:1;
        $skills->update();
        $this->showModal('success', 'Success', 'Skill status has been changed successfully');
    }

}

<?php

namespace App\Http\Livewire\Admin\Hospital;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class HospitalList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];
    protected $paginationTheme = 'bootstrap';
    public $searchName, $searchEmail, $searchPhone, $searchStatus = -1, $perPage = 5;
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
        $this->searchName = "";
        $this->searchEmail = "";
        $this->searchPhone = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $queryData = User::query();
        
        if ($this->searchName)
            $queryData->WhereRaw(
                "concat(first_name,' ', last_name) like '%" . $this->searchName . "%' "
            );
        if ($this->searchEmail)
            $queryData->orWhere('email', 'like', '%' . $this->searchEmail . '%');

        if ($this->searchPhone)
            $queryData->orWhere('phone', 'like', '%' . $this->searchPhone . '%');

        if ($this->searchStatus >= 0)
            $queryData->where('active', $this->searchStatus);

        return view('livewire.admin.hospital.hospital-list', [
            'users' => $queryData
                ->orderBy($this->sortBy, $this->sortDirection)
                ->role('HOSPITAL')
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        User::destroy($id);
        $this->showModal('success', 'Success', 'Hospital has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this hospital!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(User $user)
    {
        $user->active = ($user->active==1)?0:1;
        $user->update();
        
        // $user->fill(['active' => ($user->active == 1) ? 0 : 1])->save();
        if ($user->active != 1) {
            $user->tokens->each(function ($token, $key) {
                $token->delete();
            });
        }

        $this->showModal('success', 'Success', 'Hospital status has been changed successfully');
    }
    
}
    
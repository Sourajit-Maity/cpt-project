<?php

namespace App\Http\Livewire\Admin\Master\Country;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Models\Country;

class CountryList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchCountryName, $searchCountryCode, $searchStatus = -1, $perPage = 5;
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
        $this->searchCountryCode = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $queryData = Country::query();

        if ($this->searchCountryName)
            $queryData->Where('country_name', 'like', '%' . $this->searchCountryName . '%');

        if ($this->searchCountryCode)
            $queryData->Where('country_code', 'like', '%' . $this->searchCountryCode . '%');

        if ($this->searchStatus >= 0)
            $queryData->where('active', $this->searchStatus);

        return view('livewire.admin.master.country.country-list', [
            'countries' => $queryData
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    
    public function deleteConfirm($id)
    {
        Country::destroy($id);
        $this->showModal('success', 'Success', 'Country has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this Country!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(Country $country)
    {
        $country->active = ($country->active==1)?0:1;
        $country->update();
        $this->showModal('success', 'Success', 'Country status has been changed successfully');
    }

}
   
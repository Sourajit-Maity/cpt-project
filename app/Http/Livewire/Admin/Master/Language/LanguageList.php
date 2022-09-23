<?php

namespace App\Http\Livewire\Admin\Master\Language;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Models\Languages;

class LanguageList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchLanguage, $searchStatus = -1, $perPage = 5;
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
        $this->searchLanguage = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $queryData = Languages::query();

        if ($this->searchLanguage)
            $queryData->Where('language_name', 'like', '%' . $this->searchLanguage . '%');

        if ($this->searchStatus >= 0)
            $queryData->where('active', $this->searchStatus);

        return view('livewire.admin.master.language.language-list', [
            'languages' => $queryData
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    
    public function deleteConfirm($id)
    {
        Languages::destroy($id);
        $this->showModal('success', 'Success', 'Language has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this language!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(Languages $language)
    {
        $language->active = ($language->active==1)?0:1;
        $language->update();
        $this->showModal('success', 'Success', 'Language status has been changed successfully');
    }

}
   
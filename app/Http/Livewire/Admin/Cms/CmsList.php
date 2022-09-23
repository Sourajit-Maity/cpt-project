<?php

namespace App\Http\Livewire\Admin\Cms;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Cms;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class CmsList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchTitle, $perPage = 5, $search;
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
        $this->searchTitle = "";
    }

    public function render()
    {
        $queryData = Cms::query();

        if ($this->searchTitle)
            $queryData->orWhere('title', 'like', '%' . $this->searchTitle . '%');

        return view('livewire.admin.cms.cms-list', [
            'cms' => $queryData
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    
}

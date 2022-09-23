<?php

namespace App\Http\Livewire\Admin\Payment;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\Jobs;
use App\Models\PaymentDetails;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class PaymentList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];

    protected $paginationTheme = 'bootstrap';

    public  $searchUser, $searchJob, $searchAmount,$searchDate,$searchStatus, $perPage = 5,$search;
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
        $this->searchUser = "";
        $this->searchJob = "";
        $this->searchDate = "";
        $this->searchAmount = "";
        $this->searchStatus = "";
    }

    public function render()
    {
        $queryData = PaymentDetails::query()->with(['user','jobdetails']);
        
        if ($this->searchUser) {
                $queryData->whereHas('user', function($query) {
                    $query->where('first_name',  'like', '%'  . $this->searchUser . '%');
                 })->get();
        }

        if ($this->searchJob) {
            $queryData->whereHas('jobdetails', function($query) {
                $query->where('job_id',  'like', '%'  . $this->searchJob . '%');
             })->get();
        }
       
        if ($this->searchDate)
            $queryData->Where('payment_datetime', 'like', '%' . $this->searchDate . '%');
        if ($this->searchAmount)
            $queryData->Where('total_amount', 'like', '%' . $this->searchAmount . '%');

        if ($this->searchStatus >= 0)
            $queryData->orWhere('status', $this->searchStatus);
            $services = PaymentDetails::with('user','jobdetails')->get();
        return view('livewire.admin.payment.payment-list', [
            'details' => $queryData
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ], [
            'services' => $services
        ]);
    }
    public function deleteConfirm($id)
    {
        PaymentDetails::destroy($id);
        $this->showModal('success', 'Success', 'status has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

}
   
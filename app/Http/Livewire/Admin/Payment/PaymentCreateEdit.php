<?php

namespace App\Http\Livewire\Admin\Payment;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\Jobs;
use App\Models\PaymentDetails;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
class PaymentCreateEdit extends Component
{
    use AlertMessage;
    public $user_id,$total_amount, $job_id,$card_id,$card_number,$payment,$hospitalList,$jobList, $transaction_no,$blankArr,$status, $transaction_for, $payment_datetime ;
    public $address;
    public $isEdit = false;
    public $transactionList = [];
    public $statusList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($payment = null)
    {
        if ($payment) {
            $this->payment = $payment;
            $this->fill($this->payment);
            $this->isEdit = true;
        } else
            $this->payment = new PaymentDetails;

        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "In-Progress"],
            ['value' => 2, 'text' => "Completed"],
            ['value' => 3, 'text' => "Failed"],
        ];
        $this->transactionList = [
            ['value' => 1, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Booking"],
            ['value' => 2, 'text' => "Cancel Charge"]
        ];
        $this->blankArr = [
            "value"=> "", "text"=> "== Select One =="
        ];
        $this->jobList = Jobs::get();
        $this->hospitalList = User::role('HOSPITAL')->get();
    }

    public function validationRuleForSave(): array
    {
        return
            [
                
                'status' => ['required'],
                'total_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1'],
                'card_id' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1'],
                'user_id' => ['required','exists:users,id'],
                'job_id' => ['required','exists:jobs,id'],
                'card_number' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1'],
                'transaction_no' => ['required'],
                'transaction_for' => ['required'],

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'status' => ['required'],
                'total_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1'],
                'card_id' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1'],
                'user_id' => ['required','exists:users,id'],
                'job_id' => ['required','exists:jobs,id'],
                'card_number' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1'],
                'transaction_no' => ['required'],
                'transaction_for' => ['required'],
            ];
    }
  
    public function saveOrUpdate()
    {
        $this->isEdit ? $this->payment->payment_datetime = Carbon::now() : $this->payment->payment_datetime = Carbon::now();
        $this->payment->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();      
        if(!$this->isEdit)
        $msgAction = 'Payment has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('payments.index');
    }

    public function render()
    {
        return view('livewire.admin.payment.payment-create-edit');
    }
}

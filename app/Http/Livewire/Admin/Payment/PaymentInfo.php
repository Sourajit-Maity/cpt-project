<?php

namespace App\Http\Livewire\Admin\Payment;

use Livewire\Component;
use App\Models\User;
use App\Models\PaymentDetails;

class PaymentInfo extends Component
{
    public $payment;

    public function mount($payment = null)
    {
       $this->payment = $payment;
    }
    
    public function render()
    {
        $details = PaymentDetails::where('id',$this->payment)->with('user','jobdetails')->first();
         //dd($details);
        return view('livewire.admin.payment.payment-info',['details'=>$details]);
    }

   
}

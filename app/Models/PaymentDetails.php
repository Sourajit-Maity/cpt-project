<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    use HasFactory;

    

    public function getStatusAttribute($value)
    {
        $status = '';
        if ($value == 1) {
            $status = 'In Progress';
        }
        if ($value == 2) {
            $status = 'Completed';
        }
        if ($value == 3) {
            $status = 'Failed';
        }
      
        return $status;
    
    }
    protected $fillable = [
    	'user_id',
    	'job_id',
    	'total_amount',
    	'card_id',
        'card_number',
    	'transaction_no',
    	'transaction_for',
    	'status',
    	'payment_datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function jobdetails()
    {
        return $this->belongsTo(Jobs::class,'job_id');
    }
}

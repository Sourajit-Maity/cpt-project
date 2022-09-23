<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NursePaymentHistory extends Model
{
    use HasFactory;
    protected $fillable = [
    	'user_id',
    	'delivery_details_id',
    	'amount',
    	'cr_dr',
    	'transaction_for',
    	'active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

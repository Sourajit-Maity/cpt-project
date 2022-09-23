<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseMoneyWithdrawl extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'withdrawal_amount', 'request_amount', 'is_requested', 'txn_id', 'txn_status', 'txn_date', 'request_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseBankDetails extends Model
{
    use HasFactory;
    protected $fillable = ['bank_name','account_holder_name','routing_number','account_number','user_id','stripe_bank_id','additional_document'];

}

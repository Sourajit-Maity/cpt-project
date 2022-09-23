<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class NurseType extends Model
{
    use HasFactory;
    protected $fillable = ['type_name','active'];

    public function jobs()
    {
        return $this->hasMany(Jobs::class);
    }
}

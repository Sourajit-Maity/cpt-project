<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseLanguages extends Model
{
    use HasFactory;

    //protected $with=['user'];

    protected $fillable = [ 
        'user_id', 'language_id', 'language_name'
    ];

    public function userlanguages(){
        return $this->belongsTo(User::class);
    }
    public function languages(){
        return $this->belongsTo(Languages::class,'language_id','id');
    }
}

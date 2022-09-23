<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseSkills extends Model
{
    use HasFactory;
    //protected $with=['user'];
    protected $fillable = [ 
        'user_id', 'skill_id', 'skill_name'
    ];

    public function skills(){
        return $this->belongsTo(Skills::class,'skill_id','id');
    }

    public function userskill(){
        return $this->belongsTo(User::class);
    }
    

}

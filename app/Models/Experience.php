<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
  

    protected $with=['user'];
    protected $fillable = [ 'from_year', 'to_year','status' ];
    
    public function user(){
        return $this->hasOne(User::class);
    }
}

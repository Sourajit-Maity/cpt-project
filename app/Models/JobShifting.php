<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobShifting extends Model
{
    use HasFactory;


    protected $appends = [
        'time_duration'
    ];

    public function getTimeDurationAttribute()
    {
        return (new Carbon($this->start_time))->diff(new Carbon($this->end_time))->format('%h:%I');
    }
}

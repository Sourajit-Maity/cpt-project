<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'job_id', 'status', 'comment', 'license', 'is_applied','start_job_time','end_job_time'];

    protected $appends = [
        'license_path'
    ];

    public function getLicensePathAttribute()
    {
        return !empty("{$this->license}") ? url()->to('storage/license/' . "{$this->license}") : '';
    }

    public function job()
    {
        return $this->belongsTo(Jobs::class, 'job_id');
    }

    public function nurse()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function selectShiftingTime()
    {
        return $this->hasOne(JobShifting::class, 'id', 'job_shifting_id')->withDefault();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    public function getStatusAttribute($value)
    {
        $type = '';
        if ($value == 1) {
            $type = 'Ongoing';
        }
        if ($value == 2) {
            $type = 'Upcoming';
        }
        if ($value == 3) {
            $type = 'Closed';
        }

        return $type;
    }

    protected $fillable = [
        'user_id',
        'project_id',
        'additional_instructions',
        'job_name',
        'employee_required',
        'hiring_budget',
        'urgent_requirement',
        'job_post_date',
        'promo_code',
        'discount_amount',
        'reward_discount_amount',
        'cancellation_charge',
        'total_amount',
        'job_apply_status',
        'job_status',
        'payment_status',
        'cancelled_by',
        'cancellation_reason',
        'cancellation_comment',
        'cancelled_at',
        'active',
        'hour'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function cancelledby()
    {
        return $this->belongsTo(User::class, 'cancelled_by');
    }

    public function paymentdetails()
    {
        return $this->belongsTo(PaymentDetails::class, 'id', 'job_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'hospital_country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'hospital_state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'hospital_city_id');
    }

    public function jobApplication()
    {
        return $this->hasMany(JobApplication::class, 'job_id', 'id')->orderBy('id', 'DESC');
    }
   
}

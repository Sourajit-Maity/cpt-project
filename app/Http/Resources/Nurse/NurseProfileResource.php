<?php

namespace App\Http\Resources\Nurse;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Jobs;
use App\Models\JobApplication;
use App\Models\Experience;
class NurseProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'country_id'=>$this->country_id,
            'country_code'=>isset($this->country->country_code)?$this->country->country_code:'',
            'state_id'=>$this->state_id,
            'state_name'=>isset($this->state->state_name)?$this->state->state_name:null,
            'city_id'=>$this->city_id,
            'city_name'=>isset($this->city->city_name)?$this->city->city_name:null,
            'is_email_verified'=>!is_null($this->email_verified_at)?true:false,
            'licence_number'=>$this->licence_number,
            'experience'=>$this->experience,
            'experience_year'=>$this->experience_year,
            'experience_month'=>$this->experience_month,
            'salary'=>$this->salary,
            'experience_id'=>$this->experience_id,           
            'date_of_birth'=>$this->date_of_birth,
            'licence_type'=>$this->licence_type,
            'profile_photo_path'=>isset($this->profile_photo_path)?url('/')."/storage/".$this->profile_photo_path:url('/')."/upload/user_default.png",
            'resume_path'=>isset($this->resume_path)?url('/')."/storage/".$this->resume_path:url('/')."/upload/user_default.png",
            'cover_photo_path'=>isset($this->cover_photo_path)?url('/')."/storage/".$this->cover_photo_path:url('/')."/upload/user_default.png",
            'experience_from_year'=>$this->get_form_year($this->experience_id),
        ];
    }

    public function get_form_year($experience_id){
        $from_year = Experience::select('from_year','to_year')->where('id',$experience_id)->first();

        if(!is_null($from_year)){
            return ($from_year);
        }else{
            return 0;
        }
    }
}

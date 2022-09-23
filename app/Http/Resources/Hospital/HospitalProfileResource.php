<?php

namespace App\Http\Resources\Hospital;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Jobs;
class HospitalProfileResource extends JsonResource
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
            'profile_photo_path'=>isset($this->profile_photo_path)?url('/')."/public".$this->profile_photo_path:url('/')."/upload/user_default.png",
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
            
        ];
    
    }
}

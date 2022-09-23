<?php

namespace App\Http\Livewire\Admin\Hospital;

use Livewire\Component;
use App\Models\User;
use Spatie\MediaLibrary\Models\Media;
class HospitalInstituteDetails extends Component
{
    public $hospital_id;

    public function mount($hospital_id = null)
    {
       $this->hospital_id = $hospital_id;
    }

    public function render()
    {
        
        $hospital = User::role('HOSPITAL')->where('id',$this->hospital_id)->first();
        //$model_image = Media::where(['model_id' => $this->hospital_id, 'collection_name' => 'images', 'model_type'=> 'App\Models\User'])->first();
        //return view('livewire.admin.hospital.hospital-institute-details',['hospital'=>$hospital,'model_image'=>$model_image,]);
        return view('livewire.admin.hospital.hospital-institute-details',['hospital'=>$hospital]);
    }
  
}

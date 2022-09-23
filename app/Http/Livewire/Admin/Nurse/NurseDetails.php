<?php

namespace App\Http\Livewire\Admin\Nurse;

use Livewire\Component;
use App\Models\User;
use Spatie\MediaLibrary\Models\Media;
class NurseDetails extends Component
{
    public $nurse_id;

    public function mount($nurse_id = null)
    {
       $this->nurse_id = $nurse_id;
    }

    public function render()
    {
        
        $nurse = User::role('NURSE')->where('id',$this->nurse_id)->first();
        $model_image = Media::where(['model_id' => $this->nurse_id, 'collection_name' => 'images', 'model_type'=> 'App\Models\User'])->first();
        return view('livewire.admin.nurse.nurse-details',['nurse'=>$nurse,'model_image'=>$model_image,]);
    }
  
}

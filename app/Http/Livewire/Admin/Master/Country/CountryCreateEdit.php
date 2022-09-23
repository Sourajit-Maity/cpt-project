<?php

namespace App\Http\Livewire\Admin\Master\Country;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Country;
use Illuminate\Validation\Rule;
use Spatie\MediaLibrary\Models\Media;
use Livewire\WithFileUploads;
use File;

class CountryCreateEdit extends Component
{
    use AlertMessage;
    use WithFileUploads;

    public $country_name, $country_code, $active, $country, $model_id, $photo, $model_image, $imgId, $maual_image, $is_manually, $short_code;
    public $isEdit = false;
    public $statusList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($country = null)
    {
        if ($country) {
            $this->country = $country;
            $this->fill($this->country);
            $this->isEdit = true;

            if($country->is_manually==0){
                $path = "/upload/flags/".strtolower($country->short_code).".png";
                $public_path = public_path($path);
                $isExists = File::exists($public_path);
                if($isExists){
                    $this->maual_image = url('/').$path;
                }else{
                    $maual_image = null;
                }
                
            }else{
                $maual_image = null;
            }

        } else
            $this->country = new Country;

        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];

        $this->model_image = Media::where(['model_id' => $this->country->id, 'collection_name' => 'country_logo'])->first();

        if (!$this->model_image == null) {
            $this->imgId = $this->model_image->id;
        }

        //dd($maual_image);
    }

    public function validationRuleForSave(): array
    {
        return
            [
                'country_name' => ['required', 'max:255'],
                'country_code' => ['required', 'max:255'],
                'short_code' => ['required', 'max:255'],
                'active' => ['required'],

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'country_name' => ['required', 'max:255'],
                'country_code' => ['required', 'max:255'],
                'short_code' => ['required', 'max:255'],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {
        $this->country->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        $msgAction = 'Country has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('countries.index');
    }
    public function render()
    {
        return view('livewire.admin.master.country.country-create-edit');
    }
}

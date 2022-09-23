<?php

namespace App\Http\Livewire\Admin\Master\City;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Validation\Rule;
class CityCreateEdit extends Component
{
    use AlertMessage;
    public $country_id, $state_id, $city_name, $active, $city, $countryList, $stateList;
    public $isEdit = false;
    public $statusList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($city = null)
    {
        if ($city) {
            $this->city = $city;
            $this->fill($this->city);
            $this->country_id = isset($city->state->country->id)?$city->state->country->id:null;
            $this->isEdit = true;
        } else
            $this->city = new City;

        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"], 
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];

        $this->countryList = Country::where('active',1)->get();
        $this->stateList = State::where('active',1)->get();
    }

    public function fetchState(){
        $this->state_id = null;
        $this->stateList = State::where('active',1)->where('country_id',$this->country_id)->get();
    }

    public function validationRuleForSave(): array
    {
        return
            [
                'city_name' => ['required', 'max:255'],
                'country_id' => ['required', 'exists:countries,id'],
                'state_id' => ['required', 'exists:states,id'],
                'active' => ['required'],
            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'city_name' => ['required', 'max:255'],
                'country_id' => ['required', 'exists:countries,id'],
                'state_id' => ['required', 'exists:states,id'],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {
        $this->city->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        $msgAction = 'City has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('cities.index');
    }
    public function render()
    {
        return view('livewire.admin.master.city.city-create-edit');
    }
}

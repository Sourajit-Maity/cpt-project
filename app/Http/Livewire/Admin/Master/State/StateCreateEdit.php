<?php

namespace App\Http\Livewire\Admin\Master\State;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Country;
use App\Models\State;
use Illuminate\Validation\Rule;

class StateCreateEdit extends Component
{
    use AlertMessage;
    public $country_id, $state_name, $active, $state, $countryList;
    public $isEdit = false;
    public $statusList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($state = null)
    {
        if ($state) {
            $this->state = $state;
            $this->fill($this->state);
            $this->isEdit = true;
        } else
            $this->state = new State;

        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];

        $this->countryList = Country::where('active',1)->get();
    }

    public function validationRuleForSave(): array
    {
        return
            [
                'state_name' => ['required', 'max:255'],
                'country_id' => ['required', 'exists:countries,id'],
                'active' => ['required'],
            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'state_name' => ['required', 'max:255'],
                'country_id' => ['required', 'exists:countries,id'],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {
        $this->state->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        $msgAction = 'State has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);
        return redirect()->route('states.index');
    }
    public function render()
    {
        return view('livewire.admin.master.state.state-create-edit');
    }
}

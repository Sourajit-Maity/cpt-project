<?php

namespace App\Http\Livewire\Admin\Master\Experience;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Experience;
use Illuminate\Validation\Rule;
use Spatie\MediaLibrary\Models\Media;
use Livewire\WithFileUploads;
use File;

class ExperienceCreateEdit extends Component
{
    use AlertMessage;
    use WithFileUploads;

    public $from_year, $to_year, $status, $experience;
    public $isEdit = false;
    public $statusList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($experience = null)
    {
        if ($experience) {
            $this->experience = $experience;
            $this->fill($this->experience);
            $this->isEdit = true;

        } else
            $this->experience = new Experience;

        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];

    }

    public function validationRuleForSave(): array
    {
        return
            [
                'from_year' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:1', 'max:10'],
                'to_year' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:1', 'max:10'],
                'status' => ['required'],

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'from_year' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:1', 'max:10'],
                'to_year' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:1', 'max:10'],
                'status' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {
        $this->experience->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        $msgAction = 'Experience has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('experiences.index');
    }
    public function render()
    {
        return view('livewire.admin.master.experience.experience-create-edit');
    }
}

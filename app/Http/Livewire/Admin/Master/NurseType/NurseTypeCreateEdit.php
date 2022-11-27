<?php

namespace App\Http\Livewire\Admin\Master\NurseType;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Project;
use Illuminate\Validation\Rule;
use Spatie\MediaLibrary\Models\Media;
use Livewire\WithFileUploads;
use File;

class NurseTypeCreateEdit extends Component
{
    use AlertMessage;
    use WithFileUploads;

    public $project_name,$project_url, $nursetype, $active;
    public $isEdit = false;
    public $statusList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($nursetype = null)
    {
        
        if ($nursetype) {
            $this->nursetype = $nursetype;
            $this->fill($this->nursetype);
            $this->isEdit = true;

        } else
            $this->nursetype = new Project;

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
                'project_name' => ['required','max:255', Rule::unique('projects')],
                'project_url' => ['required','max:255', Rule::unique('projects')],
                'active' => ['required'],
            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'project_name' => ['required','max:255', Rule::unique('projects')->ignore($this->nursetype->id)],
                'project_url' => ['required','max:255', Rule::unique('projects')->ignore($this->nursetype->id)],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {
        $this->nursetype->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        $msgAction = 'Project has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('projects.index');
    }
    public function render()
    {
        return view('livewire.admin.master.nurse-type.nurse-type-create-edit');
    }
}

<?php

namespace App\Http\Livewire\Admin\Master\Skill;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Skills;
use Illuminate\Validation\Rule;
use Spatie\MediaLibrary\Models\Media;
use Livewire\WithFileUploads;
use File;


class SkillCreateEdit extends Component
{
    use AlertMessage;
    use WithFileUploads;

    public $skill_name, $skill, $active;
    public $isEdit = false;
    public $statusList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($skill = null)
    {
        if ($skill) {
            $this->skill = $skill;
            $this->fill($this->skill);
            $this->isEdit = true;

        } else
            $this->skill = new Skills;

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
                'skill_name' => ['required','max:255', Rule::unique('skills')],
                'active' => ['required'],
            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'skill_name' => ['required','max:255', Rule::unique('skills')->ignore($this->skill->id)],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {
        $this->skill->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        $msgAction = 'Skill has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('skills.index');
    }
    public function render()
    {
        return view('livewire.admin.master.skill.skill-create-edit');
    }
}

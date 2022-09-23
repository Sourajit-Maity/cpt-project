<?php

namespace App\Http\Livewire\Admin\Master\SecurityQuestion;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\SecurityQuestion;
use Illuminate\Validation\Rule;
use Spatie\MediaLibrary\Models\Media;
use Livewire\WithFileUploads;
use File;

class SecurityQuestionCreateEdit extends Component
{
    use AlertMessage;
    use WithFileUploads;

    public $security_question_name, $securityquestion, $active;
    public $isEdit = false;
    public $statusList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($securityquestion = null)
    {
        if ($securityquestion) {
            $this->securityquestion = $securityquestion;
            $this->fill($this->securityquestion);
            $this->isEdit = true;

        } else
            $this->securityquestion = new SecurityQuestion;

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
                'security_question_name' => ['required','max:255', Rule::unique('security_questions')],
                'active' => ['required'],
            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'security_question_name' => ['required','max:255', Rule::unique('security_questions')->ignore($this->securityquestion->id)],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {
        $this->securityquestion->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        $msgAction = 'Security Question has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('security-question.index');
    }
    public function render()
    {
        return view('livewire.admin.master.security-question.security-question-create-edit');
    }
}

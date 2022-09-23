<?php

namespace App\Http\Livewire\Admin\Master\Language;
use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Languages;
use Illuminate\Validation\Rule;
use Spatie\MediaLibrary\Models\Media;
use Livewire\WithFileUploads;
use File;


class LanguageCreateEdit extends Component
{
    use AlertMessage;
    use WithFileUploads;

    public $language_name, $language, $active;
    public $isEdit = false;
    public $statusList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($language = null)
    {
        if ($language) {
            $this->language = $language;
            $this->fill($this->language);
            $this->isEdit = true;

        } else
            $this->language = new Languages;

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
                'language_name' => ['required','max:255', Rule::unique('languages')],
                'active' => ['required'],
            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'language_name' => ['required','max:255', Rule::unique('languages')->ignore($this->language->id)],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {
        $this->language->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        $msgAction = 'Language has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('languages.index');
    }
    public function render()
    {
        return view('livewire.admin.master.language.language-create-edit');
    }
}

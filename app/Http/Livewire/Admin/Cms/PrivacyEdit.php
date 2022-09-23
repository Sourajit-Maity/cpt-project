<?php

namespace App\Http\Livewire\Admin\Cms;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Cms;
use Illuminate\Validation\Rule;

class PrivacyEdit extends Component
{
    use AlertMessage;
    public $title, $text_content, $cms;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($cms = null)
    {
        if ($cms) {
            $this->cms = $cms;
            $this->fill($this->cms);
        } 
    }

    public function validationRuleForUpdate(): array
    {
        return
            [
                'title' => ['required', 'max:255'],
                'text_content' => ['required'],
            ];
    }

    public function Update()
    {
        $this->cms->fill($this->validate($this->validationRuleForUpdate()))->save();
    
        $msgAction = 'CMS has been updated successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('cms.index');
    }
    
    public function render()
    {
        return view('livewire.admin.cms.privacy-edit');
    }
}

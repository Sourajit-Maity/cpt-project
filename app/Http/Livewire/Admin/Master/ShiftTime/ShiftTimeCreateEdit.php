<?php

namespace App\Http\Livewire\Admin\Master\ShiftTime;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\ShiftTime;
use Illuminate\Validation\Rule;
use Spatie\MediaLibrary\Models\Media;
use Livewire\WithFileUploads;
use File;

class ShiftTimeCreateEdit extends Component
{
    use AlertMessage;
    use WithFileUploads;

    public $shift_name,$shift_time, $shifttime, $active;
    public $isEdit = false;
    public $statusList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($shifttime = null)
    {
        
        if ($shifttime) {
            $this->shifttime = $shifttime;
            $this->fill($this->shifttime);
            $this->isEdit = true;

        } else
            $this->shifttime = new ShiftTime;

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
                'shift_name' => ['required','max:255', Rule::unique('shift_times')],
                'shift_time' => ['required'],
                'active' => ['required'],
            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'shift_name' => ['required','max:255', Rule::unique('shift_times')->ignore($this->shifttime->id)],
                'shift_time' => ['required'],
                'active' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {
        $this->shifttime->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        $msgAction = 'Shift Time has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('shift-time.index');
    }
    public function render()
    {
        return view('livewire.admin.master.shift-time.shift-time-create-edit');
    }
}

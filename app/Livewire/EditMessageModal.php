<?php

namespace App\Livewire;

use App\Livewire\Forms\EditMessageForm;
use Livewire\Component;
use App\Models\ContactUs;

class EditMessageModal extends Component
{
    public EditMessageForm $form;
    public $message;

    public function mount(ContactUs $message)
    {
        $this->message = $message->load('media');
    }

    public function render()
    {
        $this->form->fillForm($this->message);
        return view('livewire.edit-message-modal');
    }

    public function update()
    {
        $this->form->update();

        session()->flash('updated', trans('general.messages.message_edited'));

        return redirect('messages');

    }

}

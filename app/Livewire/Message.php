<?php


namespace App\Livewire;

use App\Livewire\Forms\ContactUsForm;
use Livewire\Component;

class Message extends Component
{
    public ContactUsForm $form;

    public function render()
    {
        return view('livewire.messages')->title(trans('general.messages_list'));
    }

    public function store()
    {
        $this->form->store();

//        session()->flash('saved', trans('message.thank_you_for_contacting_us'));//todo for see session message uncomment this line

        $this->dispatch('success_alert', message: trans('message.thank_you_for_contacting_us'));

    }
}

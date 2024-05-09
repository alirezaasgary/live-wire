<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactUsForm;
use Livewire\Component;

class ContactUs extends Component
{
    public ContactUsForm $form;

    public function render()
    {
        return view('livewire.contact-us')->title(trans('general.contact_us'));
    }

    public function store()
    {
        $this->form->store();

//        session()->flash('saved', trans('general.messages.thank_you_for_contacting_us'));//todo for see session message uncomment this line

        $this->dispatch('success_alert', message: trans('general.messages.thank_you_for_contacting_us'));

    }
}

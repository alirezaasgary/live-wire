<?php

namespace App\Livewire\Forms;

use App\Enums\ContactUsStatusEnum;
use App\Models\ContactUs;
use Illuminate\Validation\Rule;
use Livewire\Form;

class EditMessageForm extends Form
{
    public $id;
    public $name;
    public $email;
    public $mobile;
    public $message;
    public $category;
    public $status;

    public function rules(): array
    {
        return [
            'id'     => ['required', 'exists:contact_us,id'],
            'status' => ['required', Rule::enum(ContactUsStatusEnum::class)],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'status' => trans('general.status'),
        ];
    }

    public function update(): void
    {
        $this->validate();

        $contactUs = ContactUs::query()
            ->findOrFail($this->id);

        $contactUs->update([
            'status' => $this->status,
        ]);

    }

    public function fillForm(ContactUs $message)
    {
        $this->id = $message->id;
        $this->name = $message->name;
        $this->email = $message->email;
        $this->mobile = $message->mobile;
        $this->message = $message->message;
        $this->category = $message->category->value;
        $this->status = $message->status->value;
    }
}

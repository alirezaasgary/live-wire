<?php

namespace App\Livewire\Forms;

use App\Enums\ContactUsCategoryEnum;
use App\Enums\ContactUsStatusEnum;
use App\Models\ContactUs;
use Illuminate\Validation\Rule;
use Livewire\Form;

class ContactUsForm extends Form
{
    public $name;
    public $email;
    public $mobile;
    public $message;
    public $category;

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:90'],
            'email'    => ['required', 'email'],
            'mobile'   => ['nullable', 'numeric', 'digits:11'],
            'message'  => ['required', 'string', 'max:5000'],
            'category' => ['required', Rule::enum(ContactUsCategoryEnum::class)],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'category' => trans('general.subject'),
            'mobile'   => trans('general.phone_number'),
        ];
    }

    public function store(): void
    {
        $this->validate();

        $formData = $this->only([
            'name',
            'email',
            'mobile',
            'message',
            'category'
        ]);
        $formData['category'] = ContactUsCategoryEnum::from($formData['category'])->value;
        $formData['status'] = ContactUsStatusEnum::WAITING->value;

        ContactUs::query()->create($formData);

        $this->reset();

    }

}

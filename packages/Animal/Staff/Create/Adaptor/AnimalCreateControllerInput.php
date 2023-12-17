<?php

namespace Packages\Animal\Staff\Create\Adaptor;

use Illuminate\Foundation\Http\FormRequest;

class AnimalCreateControllerInput extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'  => ['string'],
            'width' => ['nullable', 'regex:^\d{0,2}(\.\d{1,2})?$/']
        ];
    }

    public function getName(): int
    {
        return $this->input('name');
    }

    public function getWidth(): int
    {
        return $this->input('name');
    }
}

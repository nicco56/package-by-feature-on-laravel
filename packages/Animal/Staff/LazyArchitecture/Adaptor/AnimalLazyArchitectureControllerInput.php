<?php

namespace Packages\Animal\Staff\LazyArchitecture\Adaptor;

use Illuminate\Foundation\Http\FormRequest;

class AnimalLazyArchitectureControllerInput extends FormRequest
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
            'name'  => ['required','string'],
            'width' => ['required', 'integer']
        ];
    }

    public function getName(): string
    {
        return $this->input('name');
    }

    public function getWidth(): int
    {
        return $this->input('width');
    }
}

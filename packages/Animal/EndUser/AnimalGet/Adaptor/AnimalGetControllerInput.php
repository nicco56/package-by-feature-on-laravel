<?php

namespace Packages\Animal\EndUser\AnimalGet\Adaptor;

use Illuminate\Foundation\Http\FormRequest;

class AnimalGetControllerInput extends FormRequest
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
        return [];
    }

    public function getId(): int
    {
        return (int)$this->route('id');
    }
}

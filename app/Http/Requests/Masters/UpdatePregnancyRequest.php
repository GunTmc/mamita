<?php

namespace App\Http\Requests\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePregnancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function getValidatorInstance()
    {
        $this->merge(['id' => $this->id]);
        return parent::getValidatorInstance();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'uuid|exists:pregnancies,id',
            'note' => 'required|string',
            'gestationalAge' => 'required|numeric',
            'weight' => 'required|numeric',
            'fetus' => 'file|image|mimes:jpeg,png,jpg,gif,svg|nullable',
            'usg' => 'file|image|mimes:jpeg,png,jpg,gif,svg|nullable',
        ];
    }
}

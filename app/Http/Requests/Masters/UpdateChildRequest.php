<?php

namespace App\Http\Requests\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChildRequest extends FormRequest
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
            'id' => 'uuid|exists:children,id|required',
            'vaccine' => 'string|required',
            'note' => 'string|nullable',
            'weight' => 'numeric|required',
            'height' => 'numeric|required',
            'age' => 'numeric|required',
            'headCircumference' => 'numeric|nullable',
        ];
    }
}

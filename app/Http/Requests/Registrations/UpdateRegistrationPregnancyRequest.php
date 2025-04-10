<?php

namespace App\Http\Requests\Registrations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRegistrationPregnancyRequest extends FormRequest
{
    protected function getValidatorInstance()
    {
        $this->merge([
            'id' => $this->route('id')
        ]);
        return parent::getValidatorInstance();
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:registrations_pregnancies,id',
            'lastPeriodMenstruation' => 'required|date',
            'estimatedDateOfDelivery' => 'nullable|date',
            'periodPregnancy' => 'required|string',
            'history' => 'nullable|string',
        ];
    }
}

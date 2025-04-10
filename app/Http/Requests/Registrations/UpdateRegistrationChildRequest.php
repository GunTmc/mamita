<?php

namespace App\Http\Requests\Registrations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRegistrationChildRequest extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Register failed',
            'data' => [
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ]
        ], 400));
    }

    protected function getValidatorInstance()
    {
        $this->merge(['id' => $this->route('id')]);
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
            'id' => 'required|exists:registrations_children,id',
            'name' => 'required|string',
            'dateOfBirth' => 'required|date',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'gender' => 'required|string',
            'status' => 'string|nullable',
            'monthRegistration' => 'string|nullable',
        ];
    }
}

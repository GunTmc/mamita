<?php

namespace App\Http\Requests\Registrations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRegistrationPregnancyRequest extends FormRequest
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
        $this->merge(['userId' => request()->user()->id]);
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
            'userId' => 'required|exists:users,id',
            'lastPeriodMenstruation' => 'required|date-format:d-m-Y',
            'estimatedDateOfDelivery' => 'nullable|date-format:d-m-Y',
            'periodPregnancy' => 'required|string',
            'history' => 'nullable|string',
        ];
    }
}

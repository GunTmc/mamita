<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $this->merge([
            'id' => $this->route('id'),
            'verified' => filter_var($this->input('verified', false), FILTER_VALIDATE_BOOLEAN),
        ]);

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
            'id' => 'required|exists:users,id',
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'min:10', 'max:255'],
            'nameHealthCare' => ['nullable', 'string'],
            'addressHealthCare' => ['nullable', 'string', 'max:255'],
            'username' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8'],
            'passwordConfirmation' => ['nullable', 'required_with:password', 'same:password'],
            'verified' => ['nullable', 'boolean'],
        ];
    }
}

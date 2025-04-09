<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MediaSocialUpdateRequest extends FormRequest
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
            'id' => Auth::user()->id,
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
            'x' => 'nullable|unique:users,x,' . Auth::user()->id . ',id',
            'facebook' => 'nullable|unique:users,facebook,' . Auth::user()->id . ',id',
            'instagram' => 'nullable|unique:users,instagram,' . Auth::user()->id . ',id',
        ];
    }
}

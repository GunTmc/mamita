<?php

namespace App\Http\Requests\Activity;

use App\Models\Activity;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateActivityRequest extends FormRequest
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
        $categoriesAvailable = Activity::CATEGORY_AVAILABLE;

        return [
            'id' => 'required|uuid|exists:activities,id',
            'name' => 'string|required',
            'description' => 'string|nullable',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => ['string', 'required', Rule::in($categoriesAvailable)],
        ];
    }
}

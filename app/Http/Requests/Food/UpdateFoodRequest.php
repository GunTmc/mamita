<?php

namespace App\Http\Requests\Food;

use App\Models\Food;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFoodRequest extends FormRequest
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
        $categoriesAvailable = Food::CATEGORY_AVAILABLE;
        return [
            'id' => 'required|uuid|exists:food,id',
            'name' => 'string|required',
            'description' => 'string|nullable',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => ['string', 'required', Rule::in($categoriesAvailable)],
        ];
    }
}

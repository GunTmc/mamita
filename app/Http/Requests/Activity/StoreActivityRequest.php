<?php

namespace App\Http\Requests\Activity;

use App\Models\Activity;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreActivityRequest extends FormRequest
{
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
        $categoriesAvailable = Activity::CATEGORY_AVAILABLE;
        return [
            'name' => 'string|required',
            'description' => 'string|nullable',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => ['string', 'required', Rule::in($categoriesAvailable)],
        ];
    }
}

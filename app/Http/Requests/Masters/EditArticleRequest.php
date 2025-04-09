<?php

namespace App\Http\Requests\Masters;

use App\Models\Masters\Article;
use Illuminate\Foundation\Http\FormRequest;

class EditArticleRequest extends FormRequest
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
            'id' => $this->id,
            'sourceId' => $this->sourceId,
            'type' => $this->type
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
        $type = $this->input('type');
        $table = $type === Article::TYPE_PREG ? 'pregnancies' : 'children';
        return [
            'sourceId' => "required|string|exists:$table,id",
            'id' => 'exists:articles,id|required',
            'type' => 'required|string',
        ];
    }
}

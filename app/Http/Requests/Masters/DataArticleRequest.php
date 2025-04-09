<?php

namespace App\Http\Requests\Masters;

use App\Models\Masters\Article;
use Illuminate\Foundation\Http\FormRequest;

class DataArticleRequest extends FormRequest
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
            'sourceId' => $this->route('sourceId'),
            'type' => $this->route('type'),
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
        $table = match ($type) {
            Article::TYPE_PREG => 'pregnancies',
            Article::TYPE_CHILD => 'children',
            Article::TYPE_NEWS => 'users',
            default => '',
        };

        return [
            'sourceId' => "required|string|exists:$table,id",
            'type' => 'required|string|in:preg,child,news',
        ];
    }
}

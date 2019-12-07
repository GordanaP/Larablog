<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use App\Rules\IsAuthor;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ids' => 'sometimes|exists:articles,id',
            'user_id' => [
                'sometimes','required','exists:users,id',
                new IsAuthor()
            ],
            'title' => [
                'sometimes','required', 'min:5', 'max:100',
                Rule::unique('articles')->ignore($this->article),
            ],
            'excerpt' => 'sometimes|required|min:5|max:300',
            'body' => 'sometimes|required|min:5',
            'category_id' => 'sometimes|required|exists:categories,id',
            'tag_id' => 'nullable|exists:tags,id',
            // 'image' => 'sometimes|image',
            'is_approved' => 'sometimes|required|boolean',
            'publish_at' => [
                'nullable','required_if:is_approved,1', 'date_format:Y-m-d',
                'after:'.Carbon::yesterday()
            ],
        ];
    }
}

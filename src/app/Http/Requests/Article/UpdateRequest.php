<?php

namespace App\Http\Requests\Article;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $article = Article::find($this->route('article'));
        if (! $article) {
            return false;
        }
        return $article->user_id === $this->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:5000'],
        ];
    }

    /**
    * バリデーションエラーのカスタム属性の取得
    *
    * @return array<string, mixed>
    */
    public function attributes()
    {
        return [
            'content' => '記事内容',
        ];
    }
}

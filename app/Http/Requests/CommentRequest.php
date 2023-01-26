<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'author' => ['required', 'max:128', 'min:2', 'string'],
            'body' => ['required','max:900', 'min:5'],
            'score' => ['required', 'regex:#[1-5]#'],
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Поле должно быть заполнено',
            "author.min" => 'Поле должно быть не менее двух символов',
            "author.max" => 'Поле должно быть не более 128 символов',
            "author.string" => 'Поле должно быть строчным значением',
            'body.max' => 'Поле должно быть не более 900 символов',
            "body.min" => 'Поле должно быть не менее пяти символов',
            'score.required' => 'Оценка может быть только от 1 до 5.',
            'score.regex' => 'Оценка может быть только от 1 до 5.',
        ];
    }
}

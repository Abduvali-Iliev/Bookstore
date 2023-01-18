<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
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
            'name' => ['required', 'max:128', 'min:2', 'string'],
            'description' => ['required','max:900'],
            'author_id' => ['nullable'],
            'genre_id' => ['required'],
            'image' => ['required' ,'image'],
            'price' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле должно быть заполнено',
            "name.min" => 'Поле должно быть не менее двух символов',
            "name.max" => 'Поле должно быть не более 128 символов',
            "name.string" => 'Поле должно быть строчным значением',

            'description.max' => 'Поле должно быть не более 900 символов',

            'image.image' => 'Файл должен быть изображением',
            'price.required' => 'Цена книги не указана',
            'genre_id' => 'Укажите жанр книги'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'description' => ['max:1000'],
            'image' => [ 'image']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Поле должно быть заполнено',
            "name.min" => 'Поле должно быть не менее двух символов',
            "name.max" => 'Поле должно быть не более 128 символов',
            "name.string" => 'Поле должно быть строчным значением',

            'description.max' => 'Поле должно быть не более 1000 символов',

            'image.image' => 'Файл должен быть изображением',
        ];
    }
}

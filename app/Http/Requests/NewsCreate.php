<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreate extends FormRequest
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
            'title' => ['required', 'string', 'min:5', 'max:55'],
            'category_id' => ['required', 'array'],
            'description' => ['required', 'string', 'min:5', 'max:250'],
            'image' => ['sometimes']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute необходимо заполнить'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок новости',
            'category_id' => 'Категория новости',
            'description' => 'Описание'
        ];
    }
}

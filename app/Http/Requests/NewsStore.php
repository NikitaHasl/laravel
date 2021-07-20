<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsStore extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:199'],
            'category_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'img' => ['sometimes'],
            'status' => ['required'],
            'description' => ['required', 'min:15', 'max:299']
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute обязательно к заполнению!'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок'
        ];
    }
}

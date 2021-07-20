<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStore extends FormRequest
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
            'color' => ['sometimes'],
            'description' => ['required', 'min:15', 'max:299']
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Название'
        ];
    }
}

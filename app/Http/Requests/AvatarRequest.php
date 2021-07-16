<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvatarRequest extends FormRequest
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
            'img' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        ];
    }
    public function messages() {
        return [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'mimes' => 'Формат должен быть jpeg, jpg, png, gif',
            'max' => 'Размер файла не должен превышать 10mb',
        ];
    }
}

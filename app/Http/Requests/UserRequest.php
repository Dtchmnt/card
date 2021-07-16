<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'bail|required|max:255|regex:/^[a-z]+$/i|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ];


    }

    public function messages() {
        return [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'unique' => 'Поле «:attribute» должно быть уникальным',
            'max' => 'Поле «:attribute» должно быть не больше :max символов',
            'min' => 'Пароль должен быть :min или больше',
            'regex' => 'Логин должен состоять из английских символов',
            'same' => 'Подвердите пароль'
        ];
    }
}

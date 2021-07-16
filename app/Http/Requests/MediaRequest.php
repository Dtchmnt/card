<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
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
            'first_name' => 'max:255|nullable',
            'last_name' => 'max:255|nullable',
            'email' => 'email|nullable',
            'phone' => 'string|nullable',
            'telegram' => 'string|max:255|nullable',
            'whats' => 'string|nullable',
            'viber' => 'string|nullable',
            'facebook' => 'url|nullable',
            'instagram' => 'url|nullable',
            'vk' => 'url|nullable',
            'youtube' => 'url|nullable',
            'in' => 'url|nullable',
            'twitter' => 'url|nullable',
            'slug' => 'max:255|nullable',
        ];
    }
}

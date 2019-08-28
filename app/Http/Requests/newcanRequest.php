<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory;

class newcanRequest extends FormRequest
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
            'firstname' => 'required|max:255',  // nullable | integer
            'lastname' => 'required|max:255',
            'day' => 'required|numeric',
            'month' => 'required|numeric',
            'year' => 'required|numeric',
            'gender' => 'required|max:255',

            'email' => 'required|email',
            'password' => 'required|min:8',
            'city' => 'required|max:255',
            'otrasl' => 'required|max:255',

            'agree' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Поле обязательно для заполнения',
            'lastname.required'  => 'Поле обязательно для заполнения',
            'gender.required'  => 'Поле обязательно для заполнения',
            'email.required'  => 'Поле обязательно для заполнения',
            'password.required'  => 'Поле обязательно для заполнения',
            'city.required'  => 'Поле обязательно для заполнения',
            'otrasl.required'  => 'Поле обязательно для заполнения',
            'agree.required'  => 'Поле обязательно для заполнения',
        ];
    }
}

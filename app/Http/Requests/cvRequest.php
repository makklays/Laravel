<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cvRequest extends FormRequest
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
            'user_id' => '',
            'title' => '',
            'lang' => '',

            'firstname' => 'required',
            'lastname' => 'required',
            'birthday' => 'required',
            'month' => 'required',
            'year' => 'required',
            'gender' => 'required',

            'phone' => 'required',
            'email' => 'required|email',
            'city' => 'required',
            'citizenship' => '',

            'typejob' => '',
            'otrasl' => '',
            'salary' => '',
            'currency' => '',
            'about' => '',

            'has_car' => '',
            'has_a' => '',
            'has_b' => '',
            'has_c' => '',
            'has_d' => '',
            'has_e' => '',
            'has_be' => '',
            'has_ce' => '',
            'has_de' => '',
            'has_tm' => '',
            'has_tb' => '',

            'viewes' => '',
            'visibility' => '',
            'is_delete' => '',
            'created_at' => '',
            'modified_at' => '',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Поле обязательно для заполнения',
            'lastname.required'  => 'Поле обязательно для заполнения',

            'birthday.required'  => 'Поле обязательно для заполнения',
            'gender.required'  => 'Поле обязательно для заполнения',

            'phone.required'  => 'Поле обязательно для заполнения',
            'email.required'  => 'Поле обязательно для заполнения',
            'city.required'  => 'Поле обязательно для заполнения',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class companyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',  // nullable | integer
            'email' => 'required|max:255',
            'logo' => '',
            'is_checked' => '',
            'website' => 'required|max:255',
            'created_at' => '',
            'updated_at' => '',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле обязательно для заполнения',
            'email.required'  => 'Поле обязательно для заполнения',
            'website.required'  => 'Поле обязательно для заполнения',
        ];
    }
    
    // for api from /route/api.php - when validate 
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            return response()->json([
                'status' => 'failure',
                'message' => 'Bad Request',
                'errors' => $validator->errors(),
            ]);
        });
    }
}

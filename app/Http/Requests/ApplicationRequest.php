<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            //
                'name' => 'required|required|max:255',
                'phone'=>'required|numeric|between:1000,99999999999999999999',
                'description' => 'required|max:1000',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
                'name.required' => 'Введите имя',
                'description.required' => 'Введите обращение',
                'phone.required' => 'Введите телефон',
                'phone.numeric' => 'В телефоне допускаються только цифры',
                'phone.between' => 'В телефоне допускаються только цифры',
                'phone.min' => 'Минимум :min символов',
        ];
    }
}

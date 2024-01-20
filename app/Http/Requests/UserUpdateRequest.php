<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'surname' => 'string|max:64',
            'name' => 'string|max:64',
            'patronymic' => 'string|max:64',
            'sex' => 'boolean',
            'birth' => 'date',
            'login' => 'string|unique:users',
            'password' => 'string|max:255|min:6',
            'email' => 'string|email|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'max' => 'Поле :attribute не должно превышать максимально допустимого значения.',
            'min' => 'Поле :attribute не должно быть меньше допустимого значения.',
            'string' => 'Поле :attribute должно иметь строковый тип',
            'boolean' => 'Поле :attribute должно иметь логический тип',
            'date' => 'Поле :attribute не соответствует формату даты',
            'login.unique' => 'Пользователь с данным логином уже имеется в системе.',
            'email.unique' => 'Пользователь с данной почтой уже имеется в системе.',
            'email' => 'Поле :attribute не соответствует формату почты.',
        ];
    }
}

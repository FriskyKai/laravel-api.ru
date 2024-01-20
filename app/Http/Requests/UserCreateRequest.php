<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends ApiRequest
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
            'surname' => 'required|string|max:64|regex:/^[а-яА-ЯёЁ]+$/u',
            'name' => 'required|string|max:64',
            'patronymic' => 'nullable|string|max:64',
            'sex' => 'required|boolean',
            'birth' => 'required|date',
            'login' => 'required|string|unique:users|regex:/^[a-zA-Z0-9-]+$/i',
            'password' => 'required|string|max:255|min:6',
            'email' => 'required|string|email|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute не должно быть пустым.',
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

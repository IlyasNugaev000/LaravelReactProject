<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LendingFormRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'surname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'birthday' => 'required|date_format:Y-m-d|before_or_equal:today',
            'employment' => 'required|bool',
            'amount' => 'required|int|min:1',
            'period' => 'required|int|min:1',
            'citizen' => 'required|bool',
            'phone' => 'required|regex:/\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}/u',
            'email' => 'required|email|max:255',
        ];
    }
}

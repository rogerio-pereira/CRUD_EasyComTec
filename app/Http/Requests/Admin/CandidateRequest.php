<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'skype' => 'required',
            'city' => 'required',
            'state' => 'required',
            'linkedin' => 'nullable|url',
            'portfolio' => 'nullable|url',
            'availability' => 'required',
            'best_time' => 'required',
            'salary' => 'required|numeric',
            'crud' => 'required|url',

            'bank.bank_information' => 'required',
            'bank.owner' => 'required',
            'bank.cpf' => 'nullable|cpf',
            'bank.bank' => 'required',
            'bank.agency' => 'required|numeric',
            'bank.account' => 'required',
            'bank.account_type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'bank.bank_information.required' => 'The bank information field is required.',
            'bank.owner.required' => 'The owner field is required.',
            'bank.cpf.cpf' => 'Invalid CPF',
            'bank.bank.required' => 'The bank field is required.',
            'bank.agency.required' => 'The agency field is required.',
            'bank.account.required' => 'The account field is required.',
            'bank.account_type.required' => 'The account_type field is required.',
        ];
    }
}

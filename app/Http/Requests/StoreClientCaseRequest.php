<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreClientCaseRequest extends FormRequest
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
            'reporterEmail' => 'required|email|unique:client_cases,reporter_email',
            'reporterName'  => 'required|alpha_dash',
            'reporterAge'   => 'required|integer|between:1,130',
            'reporterUrl'   => 'required|url'
        ];
    }

    /**
     * Messages that apply to the request
     *
     * @return array
     */
    public function messages()
    {
        return [
            'reporterEmail.required'     => 'An email address is required.',
            'reporterEmail.email'        => 'You must use a valid format for the email address.',
            'reporterEmail.unique'       => 'The email address already exists in our system.',
            'reporterName.required'      => 'A name is required.',
            'reporterName.alpha_dash'    => 'Only alpha-numeric characters, as well as dashes and underscores are allowed for the name.',
            'reporterAge.required'       => 'An age is required.',
            'reporterAge.integer'        => 'Only positive numbers are allowed for the age.',
            'reporterAge.digits_between' => 'You must provide an age between 1 and 130.',
            'reporterUrl.required'       => 'An url is required.',
            'reporterUrl.url'            => 'You must use a valid format for the url.'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'data'    => $validator->errors()
        ]));
    }
}

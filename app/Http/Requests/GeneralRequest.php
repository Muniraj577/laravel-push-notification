<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralRequest extends FormRequest
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
            'company_name' => 'required',
            'company_logo' => 'mimes:jpeg,png,jpg,svg|max:4096|nullable',
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'Please enter company name.',
            'company_logo.mimes' => 'Invalid image format. Please upload jpg,png,jpeg,svg file',
            'company.max' => 'Logo must be only upto 4MB',
        ];
    }
}

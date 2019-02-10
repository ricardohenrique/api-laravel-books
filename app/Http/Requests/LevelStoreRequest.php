<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelStoreRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255'
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
            'name.required' => '[:attribute] - is required',
            'name.string' => '[:attribute] - must be a string',
            'name.min' => '[:attribute] - must be between-:min-:max',
            'name.max' => '[:attribute] - must be between-:min-:max',
        ];
    }
}

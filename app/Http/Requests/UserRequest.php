<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == "PUT") {
            return [
                'name' => 'max:255',
                'email' => 'required|email|max:255|unique:App\Models\User,email,' . $this->request->get('id'),
                'phone' => 'max:255',
                'password' => 'nullable|confirmed',
            ];
        }
        return [
            'name' => 'max:255',
            'email' => 'required|email|max:255|unique:App\Models\User,email,' . $this->request->get('id'),
            'phone' => 'max:255',
            'password' => 'required|confirmed',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}

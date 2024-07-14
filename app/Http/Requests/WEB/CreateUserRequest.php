<?php

namespace App\Http\Requests\WEB;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            "name" => "required|min:3",
            'email' => 'required|email|unique:users,email',
            "password" => "required",
            "phone" => "required|min:5",
            "photo" => "required|mimes:jpeg,png,jpg",
            "subdistrict_id" => 'required|exists:subdistricts,id'
        ];
    }
}

<?php

namespace App\Http\Requests\API;

use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProfileRequest extends FormRequest
{
    use ResponseAPI;
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
     * 
     */
    public function rules()
    {
        return [
            "name" => "required |min:3",
            "photo" => "image|max:2048|mimes:png,jpg",
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->requestValidation(formatErrorValidatioon($validator->errors())));
    }
}

<?php

namespace App\Http\Requests\API;



use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegiesterRequest extends FormRequest
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
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'min:5',
            'phone' => 'min:7|numeric',
            'password' => 'required|min:8',
            'subdistrict_id' => 'required|exists:subdistricts,id',
            'password_confirmation' => 'required|same:password|min:8',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        $subdistrictIdErrorMessage = $validator->errors()->first('subdistrict_id');

        if ($subdistrictIdErrorMessage === 'The selected subdistrict id is invalid.') {
            throw new HttpResponseException($this->requestNotFound('Subdistrict not found!'));
        }
        throw new HttpResponseException($this->requestValidation(formatErrorValidatioon($validator->errors()), 'Failed!'));
    }
}

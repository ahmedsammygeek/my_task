<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class ReserRoomRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'check_in_date' => 'required' , 
            'check_out_date' => 'required'
        ];
    }



    protected function failedValidation(Validator $validator) { 
        throw new HttpResponseException(response()->json([
            'status' => 'error' , 
            'message' => 'please enter valid data' , 
            'errors' => $validator->errors()->all() , 
            'data' => [] , 
        ]
        , 422)); 
    }
}

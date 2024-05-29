<?php

namespace App\Http\Requests\Board\Rooms;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
            'name' => 'required' , 
            'availability' => 'required', 
            'type' => 'required' , 
            'price' => 'required' , 
            'description' => 'required' , 
            'image' => 'nullable|image' , 
            'images.*' => 'nullable|image' , 
            'area_id' => 'required' , 
        ];
    }
}

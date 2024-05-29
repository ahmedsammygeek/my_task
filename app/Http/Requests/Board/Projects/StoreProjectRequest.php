<?php

namespace App\Http\Requests\Board\Projects;

use Illuminate\Foundation\Http\FormRequest;
use Alaouy\Youtube\Rules\ValidYoutubeVideo;
class StoreProjectRequest extends FormRequest
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
            'image' => 'required|image' , 
            'name_ar' => 'required' , 
            'is_active' => 'nullable' , 
            'category_id' => 'required' , 
            'area_id' => 'required' , 
            'address' => 'required' , 
            'rooms' => 'required' , 
            'bathrooms' => 'required' , 
            'total_area' => 'required' , 
            'price' => 'required' , 
            'garage' => 'required' , 
            'basement' => 'required' , 
            'swimming_pool' => 'required' , 
            'type' => 'required' , 
            'youtube_link' => ['nullable'  , new ValidYoutubeVideo ] , 
            'images' => 'nullable' , 
            'images.*' => 'image' , 
            'slides' => 'nullable' , 
            'slides.*' => 'image' , 
            'content' => 'required' , 
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required|max:50|unique:projects,title',
            'description'=>'required|max:500',
            'language'=>'required|max:255',
            'image'=>'nullable|image|max:2048',
            'type_id'=>'nullable|exists:types,id',
            'technology'=>'nullable|exists:technologies,id'
        ];
    }
}

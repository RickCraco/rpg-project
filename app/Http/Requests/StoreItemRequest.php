<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|min:3|max:200',
            'slug'=>'required|min:3|max:200',
            'category'=>'required|min:3|max:100',
            'type'=>'required|min:3|max:100',
            'weight'=>'required|min:1|max:10',
            'cost'=>'required|min:1|max:20',
            'image'=>'nullable|image',
        ];
    }
}

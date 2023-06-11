<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
            "name" => "required|unique:categories",
            "image" => "required",
        ];
    }

    public function messages()
    {

        return [
            "name.required" => " category နာမည်ထည့်ပါ",
            "name.unique" => " category ရှိပြီးသားဖြစ်နေပါသည်",
            "image.required" => "ဓါတ်ပုံထည့်ပေးပါ"
        ];
    }
}

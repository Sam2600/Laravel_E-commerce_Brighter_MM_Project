<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            "phone" => "required|digits_between:7,11",
            "password" => "required|min:8"
        ];
    }

    public function messages()
    {
        return [
            "phone.required" => "Phone နံပါတ် ထည့်ပေးပါ",

            "phone.digits_between" => "Phone နံပါတ် အနည်းဆုံး ၇ လုံး အများဆုံး ၁၁ လုံး ထည့်ပါ",

            "password.required" => "password ကို မဖြစ်မနေ ထည့်သွင်းပေးပါ",

            "password.min" => "password က အနည်းဆုံး ၈လုံး ရှိရပါမည်"
        ];
    }
}

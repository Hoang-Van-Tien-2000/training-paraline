<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
                'name' => 'required|max:128',
            ];
    }
    
    // public function messages()
    // {
    //     return [
    //         'name.max' => "(*) Team có độ dài nhiều nhất :max ký tự",
    //         'name.required' =>"(*) Team không được để trống ",
    //     ];
    // }    
}
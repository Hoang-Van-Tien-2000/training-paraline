<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
                'name' => 'required|between:2,50',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:8',
        
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'password.min' => "(*) Mật khẩu có độ dài ít nhất :min ký tự",
    //         'password.required' =>"(*) Mật khẩu không được để trống ",
    //         'password.confirmed' =>"(*) Mật khẩu không khớp",
    //         'name.required' =>"(*) Tên không được để trống ",
    //         'email.required' =>"(*) Email không được để trống ",
    //         'email.email' => "(*) Email không đúng định dạng",
    //         'email.unique' => "(*) Email không được trùng"
    //     ];
    // }
}
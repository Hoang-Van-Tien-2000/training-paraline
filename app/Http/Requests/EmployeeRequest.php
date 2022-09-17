<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
    public function rules(): array
    {
        $rules = [
            'avatar' => 'required|mimes:png,gif,jpeg,txt,pdf,doc|max:2048',
            'team_id' => 'required',
            'first_name' => 'required|max:129',
            'last_name' => 'required|max:129',
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required|max:256',
            'salary' => 'required|min:0',
            'position' => 'required',
            'type_of_work' => 'required',
            'status' => 'required'
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $rules['avatar'] = [
                'mimes:png,gif,jpeg,txt,pdf,doc|max:2048',
            ];
        }

        return $rules;
    }
}
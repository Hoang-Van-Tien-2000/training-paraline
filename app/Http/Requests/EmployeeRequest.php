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
                'Avatar'=> 'required|mimes:png,gif,jpeg,txt,pdf,doc|max:2048',
                //'Team' => 'required',
                'FirstName' => 'required|max:129',
                'LastName' => 'required|max:129',
                'Gender' => 'required',
                'Birthday' => 'required',
                'Address' => 'required|max:256',
                'Salary' =>'required|min:0',
                'Position' => 'required',
                'TypeOfWord' => 'required',
                'Status'=> 'required'
            ];
    }  
}
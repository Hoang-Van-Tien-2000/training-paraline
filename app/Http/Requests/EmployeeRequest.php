<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;


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
        $rules = [
            'avatar' => 'nullable|mimes:png,gif,jpeg|max:2048',
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

        if ($this->hasFile('avatar')
            && (!$this->request->has('id'))
            && !session()->has('addEmployee')) {
            $rules['avatar'] = 'required|mimes:png,gif,jpeg|max:2048';
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['avatar'] = [
                'mimes:png,gif,jpeg|max:2048',
            ];
        }

        return $rules;
    }

    public function validationData()
    {
        $all = parent::validationData();

        $imageFileName = null;
        $imageUrl = null;

        if (request()->hasFile('avatar')) {
            $image = request()->file('avatar');
            $imageFileName = 'employee_temp_' . time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/temp/', $imageFileName);
            $imageUrl = 'storage/temp/' . $imageFileName;

            session(['currentImgUrl'=> $imageUrl]);

        } else {
            $imageFileName = str_replace('storage/temp/', '', session('currentImgUrl1'));
            $imageUrl = session('currentImgUrl');
        }


        request()->merge([
            'file_name' => $imageFileName,
            'file_path' => $imageUrl,
        ]);

        request()->flash();
        return $all;
    }

    protected function failedValidation(Validator $validator)
    {
        if ($validator->errors()->has('avatar')) {
            session()->forget('currentImgUrl');
        }
        parent::failedValidation($validator);
    }
}

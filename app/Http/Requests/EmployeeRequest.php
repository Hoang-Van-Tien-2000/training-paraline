<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use MongoDB\Driver\Session;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Traits\StorageImageTrait;
use function Doctrine\Common\Cache\Psr6\get;

class EmployeeRequest extends FormRequest
{
    use StorageImageTrait;

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

        request()->flash();
        $imageFileName = str_replace('storage/temp/', '', session()->get('currentImgUrl'));
        $imageUrl = session()->get('currentImgUrl');

        request()->merge([
            'file_name' => $imageFileName,
            'file_path' => $imageUrl,
        ]);

        if (request()->hasFile('avatar')) {
            $image = request()->file('avatar');
            $imageFileName = 'employee_temp_' . time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/temp/', $imageFileName);
            $imageUrl = 'storage/temp/' . $imageFileName;

            session()->put('currentImgUrl', $imageUrl);
        }

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

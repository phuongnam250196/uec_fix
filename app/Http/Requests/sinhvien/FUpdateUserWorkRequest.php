<?php

namespace App\Http\Requests\sinhvien;

use Illuminate\Foundation\Http\FormRequest;

class FUpdateUserWorkRequest extends FormRequest
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
            'student_employment_name'=>'required',
            'student_company_name'=>'required',
            'student_timeserving'=>'required',
        ];
    }
    public function messages() {
        return [
            'student_employment_name.required'=>'Tên công việc không được để trống',
            'student_company_name.required'=>'Tên công ty không được để trống',
            'student_timeserving.required'=>'Thời gian làm việc không được để trống',
        ];
    }
}

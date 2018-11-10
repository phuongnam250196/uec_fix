<?php

namespace App\Http\Requests\GVFrontend;

use Illuminate\Foundation\Http\FormRequest;

class EditTaiKhoanSV extends FormRequest
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
            'student_class'=>'required',
            'student_code'=>'required',
            'student_name'=>'required',
            'student_birthday'=>'required',
            'student_gender'=>'required',
            'course_id'=>'required',
            'science_id'=>'required',
            'specialize_id'=>'required',
            'area_id'=>'required',            
            'student_address'=>'required',
        ];
    }
    public function messages() {
        return [
            'student_class.required' => 'Lớp không được để trống',
            'student_code.required' => 'Mã sinh viên không được để trống',
            'student_name.required' => 'Tên sinh viên không được để trống',
            'student_birthday.required' => 'Ngày sinh không được để trống',
            'student_gender.required' => 'Giới tính không được để trống',
            'course_id.required' => 'Bạn chưa chọn khóa học',
            'science_id.required' => 'Bạn chưa chọn khoa',
            'specialize_id.required' => 'Bạn chưa chọn chuyên ngành',
            'area_id.required' => 'Bạn chưa chọn tỉnh thành phố',
            'student_address.required' => 'Địa chỉ không được để trống',

        ];
    }
}

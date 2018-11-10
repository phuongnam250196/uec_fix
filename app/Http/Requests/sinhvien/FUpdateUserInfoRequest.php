<?php

namespace App\Http\Requests\sinhvien;

use Illuminate\Foundation\Http\FormRequest;

class FUpdateUserInfoRequest extends FormRequest
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
            'science_id'=>'required',
            'specialize_id'=>'required',
            'course_id'=>'required',
            'class_id'=>'required',
            'area_id'=>'required',
            'student_address'=>'required',
            // 'teacher_id'=>'required',
            // 'student_img'=>'image | max:2048',
        ];
    }
    public function messages() {
        return [
            'area_id.required'=>'Bạn chưa chọn Tỉnh/Thành phố',
            'science_id.required'=>'Bạn chưa chọn khoa',
            'specialize_id.required'=>'Bạn chưa chọn chuyên ngành',
            'course_id.required'=>'Bạn chưa chọn khóa học',
            'class_id.required'=>'Bạn chưa chọn lớp',
            // 'teacher_id.required'=>'Bạn chưa chọn giáo viên chủ nhiệm',
            'student_address.required'=>'Địa chỉ không được để trống',
            // 'student_img.image'=>'File không đúng định dạng ảnh',
            // 'student_img.max'=>'Ảnh quá lớn',
        ];
    }
}

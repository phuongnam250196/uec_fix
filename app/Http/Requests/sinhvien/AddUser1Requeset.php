<?php

namespace App\Http\Requests\sinhvien;

use Illuminate\Foundation\Http\FormRequest;

class AddUser1Requeset extends FormRequest
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
            //
            // 'student_code'=>'unique:uec_student,student_code',
            'student_code'=>'required',
            'student_img'=>'mimes:jpeg,jpg,png|max:2000',
            'student_name'=>'required',
            'student_birthday'=>'required',
            'student_gender'=>'required',
            'student_phone'=>'required',
            'student_email'=>'required | email',
            'specialize_id'=>'required',
            'course_id'=>'required',
            'science_id'=>'required',
            'class_id'=>'required',
            'teacher_id'=>'required',
            'area_id'=>'required',
            'student_address'=>'required',
        ];
    }
    public function messages() 
    {
        return [
            // 'student_code.unique'=> 'Mã sinh viên đã tồn tại',
            'student_code.required'=> 'Mã sinh viên không được để trống',
            'student_name.required'=> 'Họ tên không được để trống',
            'student_birthday.required'=> 'Ngày sinh không được để trống',
            'student_gender.required'=> 'Bạn chưa chọn giới tính',
            'student_phone.required'=> 'Số điện thoại không được để trống',
            'student_email.required'=> 'Email không được để trống',
            'student_email.email'=> 'Email không đúng định dạng',
            'student_address.required'=> 'Địa chỉ không được để trống',
            'specialize_id.required'=> 'Bạn chưa chọn chuyên ngành',
            'course_id.required'=> 'Bạn chưa chọn khóa học',
            'science_id.required'=> 'Bạn chưa chọn khoa',
            'class_id.required'=> 'Bạn chưa chọn lớp',
            'teacher_id.required'=> 'Bạn chưa chọn giáo viên chủ nhiệm',
            'area_id.required'=> 'Bạn chưa chọn tỉnh thành',
            'student_img.mimes'=>'Không đúng định dạng ảnh',
            'student_img.max'=>'Kích thước ảnh quá lớn'
        ];
        
    }
}

<?php

namespace App\Http\Requests\doanhnghiep2;

use Illuminate\Foundation\Http\FormRequest;

class AddTTDRequest extends FormRequest
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
            'recruitment_name'=>'required',
            'recruitment_salary'=>'required',
            'recruitment_amount'=>'required',
            'recruitment_age'=>'required',
            'recruitment_gender'=>'required',
            'recruitment_deadline'=>'required',
            'recruitment_describe'=>'required',
            'area_id'=>'required',
            'yearofexp_id'=>'required',
            'position_id'=>'required',
            'education_id'=>'required',
            'formality_id'=>'required',
            'career_id'=>'required',
            'recruitment_img'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ];
    }
    public function messages() {
        return [
            'recruitment_name.required' => 'Tên tin tuyển dụng không được để trống',
            'recruitment_salary.required' => 'Mức lương không được để trống',
            'recruitment_amount.required' => 'Số lượng tuyển không được để trống',
            'recruitment_age.required' => 'Độ tuổi tuyển không được để trống',
            'recruitment_gender.required' => 'Giới tính không được để trống',
            'recruitment_deadline.required' => 'Hạn tuyển không được để trống',
            'recruitment_img.image' => 'Hãy chọn đúng ảnh',
            'recruitment_img.mines' => 'Hãy chọn đúng ảnh',
            'area_id.required' => 'Bạn chưa chọn địa điểm làm việc',
            'yearofexp_id.required' => 'Bạn chưa chọn kinh nghiệm làm việc',
            'position_id.required' => 'Bạn chưa chọn chức vụ',
            'education_id.required' => 'Bạn chưa chọn bằng cấp',
            'formality_id.required' => 'Bạn chưa chọn hình thức làm việc',
            'career_id.required' => 'Bạn chưa chọn nghề nghiệp',
        ];
    }
}

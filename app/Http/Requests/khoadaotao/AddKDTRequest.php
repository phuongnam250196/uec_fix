<?php

namespace App\Http\Requests\khoadaotao;

use Illuminate\Foundation\Http\FormRequest;

class AddKDTRequest extends FormRequest
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
            'training_name'=>'required',
            'training_amount_student'=>'required',
            'training_timeserving'=>'required',
            'training_deadline'=>'required',
            'training_address'=>'required',
            'area_id'=>'required',
            'skill_id'=>'required',
            'training_img'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ];
    }
    public function messages() {
        return [
            'training_name.required' => 'Tên khóa đào tạo không được để trống',
            'training_amount_student.required' => 'Số lượng tuyển không được để trống',
            'training_timeserving.required' => 'Tổng thời gian khóa học không được để trống',
            'training_deadline.required' => 'Hạn nộp không được để trống',
            'training_address.required' => 'Địa chỉ không được để trống',
            'training_img.image' => 'Hãy chọn đúng ảnh',
            'training_img.mines' => 'Hãy chọn đúng ảnh',
            'area_id.required' => 'Bạn chưa chọn địa điểm làm việc',
            'skill_id.required' => 'Bạn chưa chọn trình độ kĩ năng',
        ];
    }
}
